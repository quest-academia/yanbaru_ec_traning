<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MProduct;

class MProductController extends Controller
{
    public function show($id)
    {
        if ($product = !MProduct::find($id)){
            // 商品IDがない時
            return view('product/not_found');
        }else{
            $product = MProduct::find($id);
            return view('product/detail', compact('product'));
        };
    }

}