<?php
namespace App\Http\Controllers;

use App\MProduct;
use App\MCategory;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        //セッションに保存したい変数を定義する（ここでは商品idと注文個数）
        //飛んできた$requestの中のname属性をそれぞれ指定
        $sessionProductId = $request->productId;
        $sessionProductQuantity = $request->quantity;
        //配列の入れ物を作る（初期化）
        $sessionData = array();
        
        //作った配列に、compact関数を用いてidと個数の変数をまとめる（”” を使っているが変数の意味）
        $sessionData = compact("sessionProductId", "sessionProductQuantity");
        
        //session_dataというキーで、$sessionDataをセッションに登録
        $request->session()->push('session_data', $sessionData);
        
        return redirect('cartitem');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //セッションに保存していた値を取得し、変数として定義
        $sessionData = $request->session()->get('session_data');
        //セッションデータのなかのそれぞれのデータを抽出
        $sessionProductId = array_column($sessionData, 'sessionProductId');
        $sessionProductQuantity = array_column($sessionData, 'sessionProductQuantity');
        dd($sessionData);

        /*
        |--------------------------------------------------------------------------
        | 以下は実装できておりません。変更をお願いいたします
        |--------------------------------------------------------------------------
        */

        //viewで表示するための変数を定義
        //取得してきたidより、Productモデルから商品を特定
        $productInfo = array();
        $productInfo = MProduct::findOrFail($sessionProductId);
        
        //カテゴリーを、Categoryモデルからidで特定
        $productCategory = array();
        $productCategory = MCategory::findOrFail($productInfo -> category_id);

        //取得してきたidより、Productモデルから商品を特定
        $productInfo = MProduct::findOrFail($sessionData -> sessionProductId);

        return view('cartitem', 
        [
            'productInfo' => $productInfo,
            'sessionProductQuantity' => $sessionProductQuantity,
            'productCategory' => $productCategory,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //変数の初期化
        $productInfo = array();
        $productCategory = array();
        $userId = '';

        //urlパラメータから飛んできたユーザidを元にモデルからそれぞれ商品、カテゴリーを特定
        $productInfo = MProduct::findOrFail($id);
        $productCategory = MCategory::findOrFail($productInfo -> category_id);
        $userId = Auth::user()->id;
        
        return view('iteminfo', 
        [
            'productInfo' => $productInfo,
            'productCategory' => $productCategory,
            'userId' => $userId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MProduct  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}