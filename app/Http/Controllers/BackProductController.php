<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MProduct;
use App\MCategory;
use App\MSales_status;
use App\MProduct_status;

class BackProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $product = MProduct::with(['category', 'sale_status', 'product_status'])->find(1);
        //category関連の定義
        $category = new MCategory;
        $categories = $category->getLists();
        // $category_name = $product->category_id->category_name; 不要なら削除
        $category_name = MCategory::find($product->category_id)->category_name;
        // dd($category_name);

        //sale_status関連の定義
        $sale_status = new MSales_status;
        $sale_statuses = $sale_status->getLists();
        // $sale_status_name = $product->sale_status->sale_status_name; 不要なら削除
        $sale_status_name = MSales_status::find($product->sale_status_id)->sale_status_name;
        
        //product_status関連の定義
        $product_status = new MProduct_status;
        $product_statuses = $product_status->getLists();
        // $product_status_name = $product->product_status->product_status_name; 不要なら削除
        $product_status_name = MProduct_status::find($product->product_status_id)->product_status_name;

        return view('seller.back_product_edit',[
            'product' => $product,
            'categories' => $categories,
            'category_name' => $category_name,
            'sale_statuses' => $sale_statuses,
            'sale_status_name' => $sale_status_name,
            'product_statuses' => $product_statuses,
            'product_status_name' => $product_status_name,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //以下おそらく不要なので削除予定
        // $categoryId = $request->category_id;
        // $sale_statusId = $request->sale_status_id;
        // $product_statusId = $request->product_status_id;
        
        //---------------以下を参考に修正予定-----------------
        //編集する商品の定義（id情報さえあれば編集する商品を配列で表示することができる！！）
        //searchproduct.blade.php の
        // {!! link_to_route('iteminfo', '商品詳細', ['id' => $product->id ], ['class' => 'btn btn-primary btn-sm']) !!}
        //を参考にバック商品検索画面から送ってもらう！！
        //-------------------------------------------------
        $product = MProduct::with(['category', 'sale_status', 'product_status'])->find(1);
        // dd($product);

        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->sale_status_id = $request->sale_status_id;
        $product->product_status_id = $request->product_status_id;
        $product->description = $request->description;
        $product->save();
        
        return redirect('seller/items');
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //ここも同様にback_product_edit.blade からid情報がいる。
        //そのためにはバック商品検索画面からid情報が必要！
        $product = MProduct::find($request->id);
        $product->delete();
        
        // return redirect('seller_show');
        return back();
    }
}
