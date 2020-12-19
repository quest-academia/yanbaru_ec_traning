<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addCart()
    {
        dd($_POST);//情報が飛んできているかの確認
        return view('cartitem');
        //ここでセッションに商品IDと個数を登録
        $request->session()->put('', '');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ここでカート内商品一覧を表示させる
        //まずリダイレクト
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
    public function show($id)//Product $product ?
    {
        //$pd = new Product(); 新しいデータ作るときだけ？
        
        //変数の初期化
        $pd_info = array();
        $pd_category = array();
        $user_id = '';

        $pd_info = Product::findOrFail($id);
        $pd_category = Category::findOrFail($pd_info -> category_id);
        $user_id = Auth::user()->id;

        //エラー画面出さないときはこの書き方
        //if($pd_info){
        //    $pd_category = Category::findOrFail($pd_info -> category_id); 
        //}
        
        
        
        //$pd_info = $pd->getData(); 条件指定でデータ取得するときはこれ？
        return view('iteminfo', 
        [
            'pd_info' => $pd_info,
            'pd_category' => $pd_category,
            'user_id' => $user_id,
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
