<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //DBファサードを使う
use App\Http\Controllers\Controller;

//use App\Product;

class SearchProductController extends Controller
{
    public function index()
    {
        $m_products = DB::table('m_products')
            ->join('m_categories', 'm_products.category_id', '=', 'm_categories.id')
            ->select('m_products.product_name', 'm_categories.category_name')
            ->get();
    }
}
