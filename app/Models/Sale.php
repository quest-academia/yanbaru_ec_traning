<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'm_sale_statuses';
    
    // Productモデルを子に持つことを記述
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
