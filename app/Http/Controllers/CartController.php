<?php

namespace App\Http\Controllers;

use App\User;
use App\MProduct;
use App\MCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /*==================================
    商品をカートに入れるメソッド(iteminfo/id)
    ==================================*/
    //商品詳細画面でカートに商品と個数を入れる処理を実行
    public function addCart(Request $request)
    {
        // dd($_POST);
        $cartData = [
            'session_products_id' => $request->products_id,
            'session_quantity' => $request->product_quantity,
        ];
        // dd($cartData);
        //session情報にcartDataという連想配列が「無い」場合
        if (!$request->session()->has('cartData')) {
            //商品情報の配列 cartData(key名)に、$cartData(配列)をSessionに追加
            $request->session()->push('cartData', $cartData);
        } else {
            //session情報にcartDataという連想配列が「有る」場合、情報取得
            $sessionCartData = $request->session()->get('cartData');
            // dd($cartData);
            // dd($sessionCartData);
            //flag定義 product_id同一確認フラグ = 同一ではない状態

            $flag = false;
            foreach ($sessionCartData as $index => $sessionData) {
                //product_idが同一であれば、フラグをtrueにする → 個数の合算処理、及びセッション情報更新。更新は一度のみ
                if ($sessionData['session_products_id'] === $cartData['session_products_id']) {
                    $flag = true;
                    $quantity = $sessionData['session_quantity'] + $cartData['session_quantity'];
                    $request->session()->put('cartData.' . $index . '.session_quantity', $quantity);
                    break;
                }
            }
            //product_idが同一ではない状態を指定 その場合であればpushする
            if ($flag === false) {
                $request->session()->push('cartData', $cartData);
            }
            // dd($sessionCartData);
        }
        //POST送信された情報をsessionに保存 'users_id'(key)に$request内の'users_id'をセット
        $request->session()->put('users_id', ($request->users_id));
        return redirect()->route('cartlist.index');




        // //セッションに商品idと注文個数の変数を定義する
        // //飛んできた$requestの中のname属性をそれぞれ指定
        // $sessionProductId = $request->productId; //商品id
        // $sessionProductQuantity = $request->quantity; //注文個数

        // $sessionData = array(); //配列の入れ物を作る（初期化）
        // //$sessionData(配列)に、compact関数を用いてidと個数の変数をまとめる（””は変数の意味）
        // $sessionData = compact("sessionProductId", "sessionProductQuantity");

        // //session_dataというキーで、$sessionDataをセッションに登録
        // $request->session()->push('session_data', $sessionData);

        // return redirect('cartitem');
    }

    public function index(Request $request)
    {
        //渡されたセッション情報をkey（名前）用いそれぞれ取得し変数に代入
        $cartData = $request->session()->get('cartData');
        $sessionUsersId = $request->session()->get('users_id');
        // dd($cartData);
        if (!empty($cartData)) {
            foreach ($cartData as &$data) {
                //二次元目の配列を指定している$dataに'product'というkeyを生成しそこに値として$productを代入
                $product = MProduct::with('category')->find($data['session_products_id']);
                $data['product'] = $product;
                $itemPrice = $data['product']->price * $data['session_quantity'];
                $data['itemPrice'] = $itemPrice;
            }
            //dd($cartData);
            //第二引数に指定したkeyの値を配列として変数に入れる
            $sessionProductsId = array_column($cartData, 'session_products_id');
            $sessionQuantity = array_column($cartData, 'session_quantity');
            // dd($sessionProductsId);

            //取得したidを元に各テーブルのカラムデータをDBから取得
            $sessionProducts = MProduct::find($sessionProductsId);
            // dd($sessionProducts);
            $sessionUsers = User::find($sessionUsersId);
            $user = Auth::user();

            //Productテーブルに該当IDが存在しない場合、戻り値としてnullが返される → issetで条件分岐を指定し例外処理を行う
            if (isset($sessionProducts)) {
                //&& $user == $sessionUsers
                return view('cartlist', compact('sessionUsers', 'cartData', 'totalPrice', 'user'));
            } else {
                $user = Auth::user();
                return view('products.no_cart_list', compact('user'));
            }
        }









        // //セッション$sessionDataに保存していた値を取得し、変数として定義
        // $sessionData = $request->session()->get('session_data');
        // //セッションデータのなかのそれぞれのデータを抽出
        // $sessionProductId = array_column($sessionData, 'sessionProductId');
        // $sessionProductQuantity = array_column($sessionData, 'sessionProductQuantity');
        // //viewで表示するための変数を定義
        // //取得してきたidより、Productモデルから商品を特定
        // $productInfo = array();
        // $productInfo = MProduct::findOrFail($sessionProductId);
        // // dd($sessionData);
        // //m_categoriesテーブルからgetLists()関数でcategory_nameとidを取得する
        // $category = new MCategory;
        // $categories = $category->getCategories();


        // dd($productInfo);

        return view(
            'cartlist',
            [
                // 'productInfo' => $productInfo,
                // 'categories' => $categories,
                // 'sessionProductQuantity' => $sessionProductQuantity,
            ]
        );
    }
    /*==================================
    商品詳細画面
    ==================================*/
    public function show($id)
    {
        //itemDetail/{id}に該当するidを元に対応するproductを取得
        $product = MProduct::find($id);
        if (!empty($product)) {
            //productのcategory_idを取得し、Category.phpを経由し該当idが所有するカテゴリー名を取得する(リレーション)
            $category_name = MCategory::find($product->category_id);
            $user = Auth::user();
            return view('iteminfo', compact('product', 'category_name', 'user'));
        }
        // else {
        //     return redirect()->route('noProd');
        // }
    }
    /*==================================
    商品をカートに入れるメソッド(iteminfo/id)
    ==================================*/
    public function remove(Request $request)
    {
        //POST送信された情報をsessionに保存 'users_id'(key)に$request内の'users_id'をセット
        $sessionUsersId = $request->session()->get('users_id');
        //session情報の取得（product_idと個数の2次元配列）
        $sessionCartData = $request->session()->get('cartData');

        //削除ボタンから受け取ったproduct_idと個数を2次元配列に
        $removeCartItem = [
            [
                'session_products_id' => $request->product_id,
                'session_quantity' => $request->product_quantity
            ]
        ];
        $newCartData = array_udiff($sessionCartData, $removeCartItem, function ($sessionCartData, $removeCartItem) {
            $result1 = $sessionCartData['session_products_id'] - $removeCartItem['session_products_id'];
            $result2 = $sessionCartData['session_quantity'] - $removeCartItem['session_quantity'];
            return $result1 + $result2;
        });
        //dd($newCartData);

        $request->session()->put('cartData', $newCartData);
        $cartData = $request->session()->get('cartData');

        if (!empty($cartData)) {
            return redirect()->route('cartlist.index');
        } else {
            $user = Auth::user();
            return view('no_cart_list', compact('user'));
        }
    }
    public function checkout()
    {
        return view('checkout');
    }

    //     public function store(Request $request)
    //     {
    //         // ここでセッションを取り出す
    //         $orderDitailNumber = "12345678";
    //         return view(
    //             'checkout',
    //             [
    //                 'orderDitailNumber' => $orderDitailNumber,
    //             ]
    //         );
    //     }
}
