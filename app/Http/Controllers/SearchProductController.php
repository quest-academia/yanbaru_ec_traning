<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MProduct;
use App\MCategory;


class SearchProductController extends Controller
{
    public function index(Request $request)
    {
        //検索フォームだけを表示する
        $category = new MCategory;
        $categories = $category->getLists();
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

        return view('searchproduct', [
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
        ]);
    }

    public function search(Request $request)
    {
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

        $query = MProduct::query();
        if (isset($searchWord)) {
            $query->where('product_name', 'like', '%' . $searchWord . '%');
        }
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        $products = $query->orderBy('category_id', 'asc')->paginate(15);

        $category = new MCategory;
        $categories = $category->getLists();

        //viewを表示
        return view('searchproduct', [
            'products' => $products,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
        ]);
    }
}
