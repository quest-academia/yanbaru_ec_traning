<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    protected $fillable = [
        'product_name', 'category_id', 'price', 'description',
        'sale_status_id', 'product_status_id', 'resist_date',
        'delete_flag', 'user_id'
    ];

    public $timestamps = false;

    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(MCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
