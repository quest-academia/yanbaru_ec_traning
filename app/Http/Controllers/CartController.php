<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use App\OrderDetail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CartController extends Controller
{
    public function addCart(Request $request)
    {   //商品詳細画面のhidden属性で送信（Request）された商品IDと注文個数を取得し配列として変数に格納
        //inputタグのname属性を指定し$requestからPOST送信された内容を取得する。
        $cartData = [
            'session_products_id' => $request->products_id,
            'session_quantity' => $request->product_quantity,
        ];
        $session = $request->session();
        //sessionにcartData配列が「無い」場合、商品情報の配列をcartData(key)という名で$cartDataをSessionに追加
        if (!$session->has('cartData')) {
            $session->push('cartData', $cartData);
        } else {
            //sessionにcartData配列が「有る」場合、情報取得
            $sessionCartData = $session->get('cartData');

            //isSameProductId定義 product_id同一確認フラグ false = 同一ではない状態を指定
            $isSameProductId = false;
            foreach ($sessionCartData as $index => $sessionData) {
                //product_idが同一であれば、フラグをtrueにする → 個数の合算処理、及びセッション情報更新。更新は一度のみ
                if ($sessionData['session_products_id'] === $cartData['session_products_id']) {
                    $isSameProductId = true;
                    $quantity = $sessionData['session_quantity'] + $cartData['session_quantity'];
                    //cartDataをrootとしたツリー状の多次元連想配列の特定のValueにアクセスし、指定の変数でValueの上書き処理
                    $session->put('cartData.' . $index . '.session_quantity', $quantity);
                    break;
                }
            }
            //product_idが同一ではない状態を指定 その場合であればpushする
            if (!$isSameProductId) {
                $session->push('cartData', $cartData);
            }
        }
        // dd($cartData);
        return redirect()->route('cart.index');
    }
    
    public function index(Request $request)
    {
        $userId = Auth::id();
        //渡されたセッション情報をkey（名前）を用いそれぞれ取得、変数に代入
        // dd($userId);
        //removeメソッドでの配列削除時の配列連番抜け対策
        $session = $request->session();
        if ($session->has('cartData')) {
            $cartData = array_values($session->get('cartData'));
        }
        // dd($request);
        if (!empty($cartData)) {
            // array_column();を用い配列から、必要な値だけを抽出した配列に変換
            $sessionProductsId = array_column($cartData, 'session_products_id');
            $inCartProduct = Product::with('category')->find($sessionProductsId);

            foreach ($cartData as $index => &$data) {
                //二次元目の配列を指定している$dataに'product〜'key生成 Modelオブジェクト内の各カラムを代入
                //＆で参照渡し 仮引数($data)の変更で実引数($cartData)を更新する
                $data['product_name'] = $inCartProduct[$index]->product_name;
                $data['category_name'] = $inCartProduct[$index]['category']->category_name;
                $data['price'] = $inCartProduct[$index]->price;
                //商品小計の配列作成し、配列の追加
                $data['itemPrice'] = $data['price'] * $data['session_quantity'];
                // dd($cartData);
            }
            unset($cartdata);
            return view('cart.index', compact('userId' , 'cartData' , 'totalPrice'));
        } else {

            return view('cart.noData',  compact('userId'));
        }
    }   

    public function delete(Request $request)
    {
        $session = $request->session();
        //session情報の取得（product_idと個数の2次元配列）
        $sessionCartData = $session->get('cartData');

        //削除ボタンから受け取ったproduct_idと個数を2次元配列に
        $deleteCartItem = [
            ['session_products_id' => $request->product_id,
            'session_quantity' => $request->product_quantity]
        ];
        //sessionデータと削除対象データを比較、重複部分を削除し残りの配列を抽出
        // array_udiff･･･データの比較にコールバック関数を用い、配列の差を計算する
        $deleteCompletedCartData = array_udiff($sessionCartData, $deleteCartItem, function ($sessionCartData, $deleteCartItem){
            $result1 = $sessionCartData['session_products_id'] - $deleteCartItem['session_products_id'];
            $result2 = $sessionCartData['session_quantity'] - $deleteCartItem['session_quantity'];
            return $result1 + $result2;
        });

        //上記の抽出情報でcartDataを上書き処理
        $session->put('cartData', $deleteCompletedCartData);
        //上書き後のsession再取得
        $cartData = $session->get('cartData');
        //session情報があればtrue
        if ($session->has('cartData')) {
            return redirect()->route('cart.index');
        }

        return view('cart.noData', ['user' => Auth::user()]);
    }

    public function store(request $request)
    {
        $session = $request->session();
        $cartData = $session->get('cartData');
        // dd($cartData);
        // 現在の日時を取得
        $now = Carbon::now();

        //インスタンス生成
        $order = new Order;
        //指定値をインスタンス代入
        $order->user_id = Auth::user()->id;
        $order->order_date = $now;
        //認証済みのユーザーのみインスタンスへ保存
        Auth::user()->orders()->save($order);

        $savedOrder = Order::where('id',$order->id)->get();
        //上記Collectionから id の値だけを取得した配列に変換
        $savedOrderId = $savedOrder->pluck('id')->toArray();

        //注文詳細情報保存を注文数分繰り返す １回のリクエストを複数カラムに分けDB登録
        foreach ((array)$cartData as $data) {
            //注文詳細情報に関わるインスタンス生成
            $orderDetail = new OrderDetail;
            $orderDetail->products_id = $data['session_products_id'];
            $orderDetail->order_id = $savedOrderId[0];
            $orderDetail->shipment_status_id = 1;
            // rand()で乱数取得
            $orderDetail->order_detail_number = rand();
            // dd($orderDetail);
            $orderDetail->order_quantity = $data['session_quantity'];
            $orderDetail->shipment_date = $now;
            $orderDetail->save();
        }

        $session->forget('cartData');

        return view('purchase_completed', compact('orderDetail'));
    }
}