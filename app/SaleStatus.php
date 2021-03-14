<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleStatus extends Model
{
    protected $table = 'm_sale_statuses';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
