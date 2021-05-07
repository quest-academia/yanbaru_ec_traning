<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\TOrder;
use App\TOrdersDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;




class ProductDetailsController extends Controller
{
    public function index()
    {
        //商品詳細画面
        $user = Auth::user();
        $products = Product::all();
        $categories = Category::all();

        return view('products.infoItem', compact('products', 'categories', 'user'));



        //商品検索画面からPOSTされたデータをviewへ送信

        // $user = Auth::user();
        // //idでプロダクトを検索
        // $product = Product::find($id);
        // $category_name = Category::find($product->category_id);
        // //該当商品あれば表示
        // if (isset($product)) {
        //     return view('products.infoItem', compact('user', 'product', 'category_name'));
        // }else{
        //     //該当商品なければ表示
        //     return view('products.notFoundItem', compact('user'));
        // }
    }









    //session保存処理
    public function addCart(Request $request)
    {
        //POSTで送信する商品IDと注文個数をセッション変数で定義&格納

        $addData = [
            'session_products_id' => $request->products_id,
            'session_products_quantity' => $request->products_quantity
        ];



        //cartDataが入ってない場合、そのままsessionへ（初めて商品を追加する場合）
        if (!$request->session()->has('cartData')) {
            $request->session()->push('cartData', $addData);
        } else {
            //cartDataが既に入ってる場合、まず情報取得して代入
            $sessionCartData = $request->session()->get('cartData');

            //代入値を番号付きでループ処理
            foreach ($sessionCartData as $key => $sessionData) {
                //もともとの入ってる商品と追加しようとする商品が同じ場合（同じ商品を追加する場合）
                if ($sessionData['session_products_id'] === $addData['session_products_id']) {

                    //個数の合算処理
                    $quantity = $sessionData['session_products_quantity'] + $addData['session_products_quantity'];

                    //商品のsession保存処理($keyのおかげで商品IDをキープ)
                    $request->session()->put('cartData.' . $key . '.session_products_quantity', $quantity);

                    //ループ処理のストップ
                    break;
                }
            }
            //もともとの入ってる商品と追加しようとする商品が違う場合（違う商品を追加する場合）

            if ($sessionData['session_products_id'] !== $addData['session_products_id']) {
                $request->session()->push('cartData', $addData);
            }
        }
        //$keyにユーザー情報をsession保存（ユーザー情報の移動作業）
        $request->session()->put('users_id', ($request->users_id));

        //保存完了したらカート内商品一覧画面にリダイレクト
        return redirect()->route('cart.index');
    }

    //session情報を取り出す
    public function takeCart(Request $request)
    {
        //カート内商品一覧
        $auth = Auth::user();

        //渡されたセッション情報をkey（名前）を用いそれぞれ取得、変数に代入
        $sessionUser = User::find($request->session()->get('users_id'));

        //removeメソッドでの配列削除時の配列連番抜け対策
        if ($request->session()->has('cartData')) {
            $cartData = array_values($request->session()->get('cartData'));
        }

        if (!empty($cartData)) {
            $sessionProductsId = array_column($cartData, 'session_products_id');
            $product = Product::with('category')->find($sessionProductsId);

            foreach ($cartData as $index => &$data) {
                //二次元目の配列を指定している$dataに'product〜'key生成 Modelオブジェクト内の各カラムを代入
                //＆で参照渡し 仮引数($data)の変更で実引数($cartData)を更新する
                $data['product_name'] = $product[$index]->product_name;
                $data['category_name'] = $product[$index]['category']->category_name;
                $data['price'] = $product[$index]->price;
                //商品小計の配列作成し、配列の追加
                $data['itemPrice'] = $data['price'] * $data['session_products_quantity'];
                $data['totalPrice'] = number_format(array_sum(array_column($cartData, 'itemPrice')));
            }

            return view('products.cart_list', compact('sessionUser', 'cartData', 'totalPrice', 'auth'));
        } else {

            return view('products.no_cart_list',  compact('auth'));
        }
    }


    /*
    |--------------------------------------------------------------------------
    | カート内商品の削除
    |--------------------------------------------------------------------------
    */
    public function remove(Request $request)
    {
        //session情報の取得（product_idと個数の2次元配列）
        $sessionCartData = $request->session()->get('cartData');

        //削除ボタンから受け取ったproduct_idと個数を2次元配列に
        $removeCartItem = [
            [
                'session_products_id' => $request->product_id,
                'session_products_quantity' => $request->product_quantity
            ]
        ];


        //sessionデータと削除対象データを比較、重複部分を削除し残りの配列を抽出
        $removeCompletedCartData = array_udiff($sessionCartData, $removeCartItem, function ($sessionCartData, $removeCartItem) {
            $result1 = $sessionCartData['session_products_id'] - $removeCartItem['session_products_id'];
            $result2 = $sessionCartData['session_products_quantity'] - $removeCartItem['session_products_quantity'];
            return $result1 + $result2;
        });

        //上記の抽出情報でcartDataを上書き処理
        $request->session()->put('cartData', $removeCompletedCartData);
        //上書き後のsession再取得
        $cartData = $request->session()->get('cartData');

        //session情報があればtrue
        if ($request->session()->has('cartData')) {
            return redirect()->route('cart.index');
        }

        return view('products.no_cart_list', compact('auth'));
    }

    //カート内商品注文確定(DB登録)
    public function store(Request $request)
    {
        //$request->session()->forget('cartData');
        $cartData = $request->session()->get('cartData');
        $now = Carbon::now();


        //オブジェクト生成
        $order = new \App\TOrder;

        //指定値をオブジェクト代入
        $order->user_id = Auth::user()->id;
        $order->order_date = $now;
        $order->save();


        //Qrderテーブルの カラム「order_number」が「$order->order_number」の最新のレコードを一つ取得
        $savedOrder = TOrder::where('id', $order->id)->get();
        $savedOrderId = $savedOrder->pluck('id')->toArray();

        //注文詳細情報保存を注文数分繰り返す １回のリクエストを複数カラムに分けDB登録
        foreach ($cartData as $data) {
            //注文詳細情報に関わるオブジェクト生成
            $orderDetail = new \App\TOrdersDetail;

            $orderDetail->product_id = $data['session_products_id'];
            $orderDetail->order_id = $savedOrderId[0];
            $orderDetail->shipment_status_id = 1;
            $orderDetail->order_detail_number = rand();
            $orderDetail->order_quantity = $data['session_products_quantity'];
            $orderDetail->shipment_date = $now;
            $orderDetail->save();
        }

        //session削除
        $request->session()->forget('cartData');
        return view('products.purchase_completed', compact('orderDetail'));
    }
}
