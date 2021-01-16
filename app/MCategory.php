<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    // m_categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getLists()
    {
        $categories = MCategory::pluck('category_name', 'id');

        return $categories;
    }
    // 「カテゴリ(category)はたくさんの商品(products)をもつ」というリレーション関係を定義する
    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
