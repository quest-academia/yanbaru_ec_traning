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

    // 追加（挙動確認）
    public function getLists()
    {
        $products = MProduct::pluck('price', 'product_name');
        return $products;
    }
}
