<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products_details = Product::with('Category')
                                ->when($request->product_name, function ($query) use ($request) {
                                    return $query->where('product_name', 'like', "%$request->product_name%");
                                })
                                ->when($request->product_category, function ($query) use ($request) {
                                    return $query->where('category_id', 'like', "%$request->product_category%");
                                })
                                ->orderByRaw("category_id ASC, product_name ASC")
                                ->paginate(15);

        $all_products_categories = Category::get();
        return view('products.search_products', compact('products_details', 'all_products_categories'));
    }
}
