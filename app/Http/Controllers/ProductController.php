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
        $ses_pd_id = $request->product_id;
        $ses_pd_Qty = $request->productQty;
        //セッションに商品IDと個数を登録（第一引数は”キー”）
        $request->session()->put('product_id', $ses_pd_id);
        $request->session()->put('productQty', $ses_pd_Qty);
        
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
        $ses_pd_id = $request->session()->get('product_id');
        $ses_pd_Qty = $request->session()->get('productQty');

        //取得してきたidより、Productモデルから商品を特定
        $pd_info = Product::findOrFail($ses_pd_id);
        //カテゴリーを、Categoryモデルからidで特定
        $pd_category = Category::findOrFail($pd_info -> category_id);
        

        return view('cartitem', 
        [
            'pd_info' => $pd_info,
            'ses_pd_Qty' => $ses_pd_Qty,
            'pd_category' => $pd_category,
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
        $pd_info = array();
        $pd_category = array();
        $user_id = '';

        //urlパラメータから飛んできたユーザidを元にモデルからそれぞれ商品、カテゴリーを特定
        $pd_info = Product::findOrFail($id);
        $pd_category = Category::findOrFail($pd_info -> category_id);
        $user_id = Auth::user()->id;

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
