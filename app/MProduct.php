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
    //カート内商品小計の合計を算出する
    public function subtotal()
    {
        $result = $this->item->price * $this->quantity;
        return $result;
    }
}
