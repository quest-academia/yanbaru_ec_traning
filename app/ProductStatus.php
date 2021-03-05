<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    protected $table = 'm_product_statuses';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
