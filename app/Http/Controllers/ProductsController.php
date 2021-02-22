<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\M_Product;
use App\M_Category;

class ProductsController extends Controller
{

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $categoryId = $request->input('categoryId');

        $query = M_Product::query();

        if (!isset($searchProduct) && !isset($searchCategoryId)) {
            $message = "検索結果がありませんでした...";
        }

        if (isset($keyword)) {
            $searchProduct = $query->where('product_name', 'like', "%$keyword%")->get();
        } else {
            $message = "検索結果がありませんでした...";
        }

        if (isset($categoryId) && $categoryId != '') {
            $searchCategoryId = $query->where('category_id', $categoryId)->get();
        }  else {
            $message = "検索結果がありませんでした...";
        }

        $products = $query->orderBy('category_id', 'asc')->paginate(5);

        $category = new M_Category;
        $categories = $category->getLists();

        return view('search')->with([
            'keyword' => $keyword,
            'products' => $products,
            'categories' => $categories,
            'categoryId' => $categoryId,
            'message' => $message,
        ]);
    }
}
