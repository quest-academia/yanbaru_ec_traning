<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\M_Product;
use App\M_Category;

class ProductController extends Controller
{

    public function search(Request $request)
    {
        
        //検索窓に入力された値を$keywordに代入
        $keyword = $request->input('keyword');
        //商品カテゴリーで選択された値を$categoryIdに代入
        $categoryId = $request->input('categoryId');

        //m_productsテーブルの情報を$queryに代入
        $query = M_Product::query();

        //以下それぞれの状況ごとの動き

        //$keywordが、db内の「product_name」と一文字でも一致しているものを取得し$searchProductに代入
        if ($keyword) {
            $query->where('product_name', 'like', "%$keyword%")->get();
        } 

        //$categoryIdが、db内の「category_id」と一致しているものを取得し$searchCategoryIdに代入
        if ($categoryId && $categoryId != '') {
            $query->where('category_id', $categoryId)->get();
        }

        //商品名・カテゴリーどちらか、もしくはどちらも、一致するものがなければ$messageを返す       
        $message = "検索結果がありませんでした...";

        //$queryをcategory_idの昇順に並べて、$productsに代入
        //ページネーションは5商品ごとに指定
        $products = $query->orderBy('category_id', 'asc')->paginate(5);

        //M_Categoryモデル内getLists()関数を使用し、m_categoriesテーブルから「category_name」「id」を取得
        $category = new M_Category;
        $categories = $category->getLists();

        //search.blade.phpに以下変数を渡す
        return view('search',compact(
            'keyword',
            'products',
            'categories',
            'categoryId',
            'message'
        ));
    }
}
