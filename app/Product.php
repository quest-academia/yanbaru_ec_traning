<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'category_name',
        'price',
        //'商品詳細のリンク',
    ];
    public function m_categories()
    {
        return $this->belongsTo(Category::class);
    }
}
