<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        //'商品詳細のリンク',
    ];
    public function m_categories()
    {
        return $this->belongsTo(Category::class);
    }
}
