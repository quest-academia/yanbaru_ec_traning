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
    public function edit($id)
    {
        $product = MProduct::with(['category', 'sale_status'])->find($id);
        //category関連の定義
        $category = new MCategory;
        $categories = $category->getLists();
        $category_name = $product->category->category_name;
        //sale_status関連の定義
        $sale_status = new MSales_status;
        $sale_statuses = $sale_status->getLists();
        $sale_status_name = $product->sale_status->sale_status_name;
        //product_status関連の定義
        $product_status = new MProduct_status;
        $product_statuses = $product_status->getLists();
        $product_status_name = $product->product_status->product_status_name;

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
        $product = MProduct::with(['category', 'sale_status'])->find($request->id);
        $product->product_name = $request->product_name;
        $product->category->category_name = $request->category_name;
        $product->price = $request->price;
        $product->sale_status->sale_status_name = $request->sale_status_name;
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
        $product = MProduct::find($request->id);
        $product->delete();
        
        // return redirect('seller_show');
        return back();
    }
}
