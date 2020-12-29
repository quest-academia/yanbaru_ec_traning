<?php

namespace App\Http\Controllers;

use App\MProduct;
use App\MCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /*==================================
    商品をカートに入れるメソッド(iteminfo/id)
    ==================================*/
    //まず、商品詳細画面でカートに商品と個数を入れる処理をする
    public function addCart(Request $request)
    {
        //セッションに保存したい変数を定義する（ここでは商品idと注文個数）
        //飛んできた$requestの中のname属性をそれぞれ指定
        $sessionProductId = $request->productId; //商品id
        $sessionProductQuantity = $request->quantity; //注文個数
        //配列の入れ物を作る（初期化）
        $sessionData = array();

        //作った配列に、compact関数を用いてidと個数の変数をまとめる（””は変数の意味）
        $sessionData = compact("sessionProductId", "sessionProductQuantity");

        //session_dataというキーで、$sessionDataをセッションに登録
        $request->session()->push('session_data', $sessionData);

        return redirect('cartitem');
    }

    public function index(Request $request)
    {
        //セッションに保存していた値を取得し、変数として定義
        $sessionData = $request->session()->get('session_data');
        //セッションデータのなかのそれぞれのデータを抽出
        $sessionProductId = array_column($sessionData, 'sessionProductId');
        $sessionProductQuantity = array_column($sessionData, 'sessionProductQuantity');
        dd($sessionData);

        //viewで表示するための変数を定義
        //取得してきたidより、Productモデルから商品を特定
        $productInfo = array();
        $productInfo = MProduct::findOrFail($sessionProductId);

        //カテゴリーを、Categoryモデルからidで特定
        $productCategory = array();
        $productCategory = MCategory::findOrFail($productInfo->category_id);

        //取得してきたidより、Productモデルから商品を特定
        $productInfo = MProduct::findOrFail($sessionData->sessionProductId);

        return view(
            'cartitem',
            [
                'productInfo' => $productInfo,
                'sessionProductQuantity' => $sessionProductQuantity,
                'productCategory' => $productCategory,
            ]
        );
    }
    public function show($id)
    {
        //変数の初期化
        $productInfo = array();
        $productCategory = array();
        $userId = '';

        //urlパラメータから飛んできたユーザidを元にモデルからそれぞれ商品、カテゴリーを特定
        $productInfo = MProduct::findOrFail($id);
        $productCategory = MCategory::findOrFail($productInfo->category_id);
        $userId = Auth::user()->id;

        return view(
            'iteminfo',
            [
                'productInfo' => $productInfo,
                'productCategory' => $productCategory,
                'userId' => $userId,
            ]
        );
    }
}
