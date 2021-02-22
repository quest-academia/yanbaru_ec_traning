<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Product extends Model
{
    protected $fillable = ['product_name', 'category_id', 'price'];

    protected $table = 'm_products';

    public function category()
    {
        return $this->belongsTo(M_Category::class);
    }

}
