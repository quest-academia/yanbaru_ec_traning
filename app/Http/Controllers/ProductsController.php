<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->product_name && $request->product_category){
            $searched_products_details = Product::Join('m_categories', 'm_products.category_id', '=', 'm_categories.id')
                                        ->where('category_id', "$request->product_category")
                                        ->where('product_name', 'like', "%$request->product_name%")
                                        ->orderByRaw("category_id ASC, product_name ASC")
                                        ->paginate(15);

            $products_details = $searched_products_details;
        }elseif ($request->product_name){
            $searched_product_name = Product::Join('m_categories', 'm_products.category_id', '=', 'm_categories.id')
                                        ->where('product_name', 'like', "%$request->product_name%")
                                        ->orderByRaw("category_id ASC, product_name ASC")
                                        ->paginate(15);

            $products_details = $searched_product_name;
        }elseif ($request->product_category){
            $searched_product_category = Product::Join('m_categories', 'm_products.category_id', '=', 'm_categories.id')
                                        ->where('category_id', "$request->product_category")
                                        ->orderByRaw("category_id ASC, product_name ASC")
                                        ->paginate(15);

            $products_details = $searched_product_category;
        }else {
            $all_products_details = Product::Join('m_categories', 'm_products.category_id', '=', 'm_categories.id')
                                        ->orderByRaw("category_id ASC, product_name ASC")
                                        ->paginate(15);

            $products_details = $all_products_details;
        }

        $all_products_categories = ProductCategory::get();
        return view('products.search_products', compact('products_details', 'all_products_categories'));
    }
}
