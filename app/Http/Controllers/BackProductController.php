<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MProduct;
use App\MCategory;
use App\MSalesStatus;
use App\MProductStatus;
use App\Http\Requests\CreateProductRequest;


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
        //category関連の定義
        $categories = MCategory::getLists();
        //sale_status関連の定義
        $saleStatuses = MSalesStatus::getLists();
        //product_status関連の定義
        $productStatuses = MProductStatus::getLists();
        // 配列化
        $data = [
            'categories' => $categories,
            'saleStatuses' => $saleStatuses,
            'productStatuses' => $productStatuses,
        ];
        return view('seller.back_product_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        $user = Auth::user();
        if ($user->id) {
            $userId = $user->id;
        }
        if ($userId) {
            $data = [
                'product_name'      => $request->productName,
                'category_id'       => $request->categoryId,
                'price'             => $request->price,
                'sale_status_id'    => $request->saleStatusId,
                'product_status_id' => $request->productStatusId,
                'description'       => $request->description,
                'user_id'           => $userId,
                'resist_date'       => date('Y-m-d H:i:s'),
                'delete_flag'       => '',
            ];
            $result = MProduct::create($data);
            // 商品保存後の可否でメッセージを出しわける
            if ($result->exists()) {
                $request->session()->flash('flash_info', '商品の登録が完了しました。');
            } else {
                $request->session()->flash('flash_error', '商品の登録に失敗しました。');
            };
            return redirect()->route('back_product_create');
        }
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
        $product = MProduct::with(['category', 'saleStatus', 'productStatus'])->find($id);

        //category関連の定義
        $categories = MCategory::getLists();
        $categoryName = MCategory::find($product->category_id)->category_name;
        $categoryId = $product->category_id;

        //sale_status関連の定義
        $saleStatuses = MSalesStatus::getLists();
        $saleStatusName = MSalesStatus::find($product->sale_status_id)->sale_status_name;
        $saleStatusId = $product->sale_status_id;

        //product_status関連の定義
        $productStatuses = MProductStatus::getLists();
        $productStatusName = MProductStatus::find($product->product_status_id)->product_status_name;
        $productStatusId = $product->product_status_id;

        return view('seller.back_product_edit',[
                'product' => $product,
                'categories' => $categories,
                'categoryName' => $categoryName,
                'categoryId' => $categoryId,
                'saleStatuses' => $saleStatuses,
                'saleStatusName' => $saleStatusName,
                'saleStatusId' => $saleStatusId,
                'productStatuses' => $productStatuses,
                'productStatusName' => $productStatusName,
                'productStatusId' => $productStatusId,
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
    public function update(CreateProductRequest $request, $id)
    {
        $product = MProduct::with(['category', 'saleStatus', 'productStatus'])->find($id);

        $product->product_name = $request->productName;
        $product->category_id = $request->categoryId;
        $product->price = $request->price;
        $product->sale_status_id = $request->saleStatusId;
        $product->product_status_id = $request->productStatusId;
        $product->description = $request->description;
        $product->save();

        return redirect('seller/items');
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

        return redirect('seller/items');
    }
}
