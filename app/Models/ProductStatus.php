<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    protected $table = 'm_product_statuses';
    
    // Productモデルを子に持つことを記述
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
