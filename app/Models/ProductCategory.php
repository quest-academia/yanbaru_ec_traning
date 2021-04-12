<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'm_categories';
    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
