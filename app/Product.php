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
}
