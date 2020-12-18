<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\MProduct;
use App\MCategory;


class SearchProductController extends Controller
{
    public function index()
    {
        //プルダウンの商品カテゴリを取得し、検索フォームだけを表示する
        $category = new MCategory;
        $categories = $category->getLists();

        return view('searchproduct', [
            'categories' => $categories
        ]);
    }

    public function search(Request $request)
    {
        //キーワードを取得
        $keyword = $request->input('keyword');
        //キーワードが入力されている場合
        if (!empty($keyword)) {
            // 商品名から検索 
            $products = MProduct::where('product_name', 'like', '%' . $keyword . '%')
                ->paginate(15);
        } else {
            //入力されていない場合
            $products = DB::table('m_products')
                ->paginate(15);
        }
        //カテゴリ検索
        $category = new MCategory;
        $categories = $category->getLists();

        $category_id = $request->category;
        if (!empty($category_id)) {
            $products = MProduct::where('category_id', $category_id)->paginate(1);
        }

        //カテゴリand商品名検索
        if (!empty($keyword) && !empty($category_id)) {
            $products = MProduct::where('product_name', 'like', '%' . $keyword . '%')
                ->paginate(15);
            $products = MProduct::where('category_id', $category_id)->paginate(15);
        }


        //viewを表示
        return view('searchproduct', [
            'keyword' => $keyword,
            'products' => $products,
            'categories' => $categories,
            'category_id' => $category_id
        ]);
    }
}
