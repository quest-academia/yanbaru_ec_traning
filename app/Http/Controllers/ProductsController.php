<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\M_Product;
use App\M_Category;

class ProductsController extends Controller
{

    public function search(Request $request)
    {

        $query = M_Product::query();

        $keyword = $request->input('keyword');
        $category = $request->input('category');

        if ($request->has('keyword') && $keyword != '') {
            $products = $query->where('product_name', 'like', "%$keyword%")->get();
        } else {
            $message = "検索結果がありませんでした...";
        }

        if ($request->has('category') && $category != '0') {
            $products = $query->where('category_id', $category)->get();
        }  else {
            $message = "検索結果がありませんでした...";
        }

        $products = $query->paginate(5);

        return view('search')->with([
            'products' => $products,
            'message' => $message,
        ]);
    
    }
}
