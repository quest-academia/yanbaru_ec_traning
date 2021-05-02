<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'm_categories';

    // Productモデルを子に持つことを記述
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
