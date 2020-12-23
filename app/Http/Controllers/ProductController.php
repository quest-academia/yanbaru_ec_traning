<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addCart(Request $request)
    {
        //セッションに保存したい変数を定義する（ここでは商品idと注文個数）
        //飛んできた$requestの中のname属性をそれぞれ指定
        $SessionProductId = $request->ProductId;
        $SessionProductQuantity = $request->Quantity;
        //配列の入れ物を作る（初期化）
        $SessionData = array();
        
        //作った配列に、compact関数を用いてidと個数の変数をまとめる（”” を使っているが変数の意味）
        $SessionData = compact("SessionProductId", "SessionProductQuantity");
        
        //session_dataというキーで、$SessionDataをセッションに登録
        $request->session()->push('session_data', $SessionData);
        
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
        $SessionData = $request->session()->get('session_data');
        //セッションデータのなかのそれぞれのデータを抽出
        $SessionProductId = array_column($SessionData, 'SessionProductId');
        $SessionProductQuantity = array_column($SessionData, 'SessionProductQuantity');
        

        //viewで表示するための変数を定義
        //取得してきたidより、Productモデルから商品を特定
        $ProductInfo = array();
        $ProductInfo = Product::findOrFail($SessionProductId);
        
        //カテゴリーを、Categoryモデルからidで特定
        $ProductCategory = array();
        $ProductCategory = Category::findOrFail($ProductInfo -> category_id);
        


        //取得してきたidより、Productモデルから商品を特定
        $ProductInfo = Product::findOrFail($SessionData -> SessionProductId);

        return view('cartitem', 
        [
            'ProductInfo' => $ProductInfo,
            'SessionProductQuantity' => $SessionProductQuantity,
            'ProductCategory' => $ProductCategory,
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //変数の初期化
        $ProductInfo = array();
        $ProductCategory = array();
        $UserId = '';

        //urlパラメータから飛んできたユーザidを元にモデルからそれぞれ商品、カテゴリーを特定
        $ProductInfo = Product::findOrFail($id);
        $ProductCategory = Category::findOrFail($ProductInfo -> category_id);
        $UserId = Auth::user()->id;

        
        return view('iteminfo', 
        [
            'ProductInfo' => $ProductInfo,
            'ProductCategory' => $ProductCategory,
            'UserId' => $UserId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
