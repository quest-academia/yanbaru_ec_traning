<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
    ];

    public function m_products()
    {
        return $this->hasMany(Product::class);
    }
}
