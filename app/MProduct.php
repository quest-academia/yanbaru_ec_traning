<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(MCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 出品者側の商品検索機能実装のために追加
    public function getCategories()
    {
        $products = MProduct::pluck('price', 'product_name');
        return $products;
    }

    public function saleStatus()
    {
        return $this->belongsTo(MSalesStatus::class);
    }

    public function productStatus()
    {
        return $this->belongsTo(MProductStatus::class);
    }
}
