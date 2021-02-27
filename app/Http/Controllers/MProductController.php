<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            // 商品IDがない時
            return view('product/not_found');
        }

        return view('product/detail', compact('product'));

        if ($product = !MProduct::find($id)){
            // 商品IDがない時
            return view('product/not_found');
        }else{
            $product = MProduct::find($id);
            return view('product/detail', compact('product'));
        };
    }

}