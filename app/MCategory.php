<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    protected $fillable = [
        'category_name',
    ];

    public function m_products()
    {
        return $this->hasMany(Product::class);
    }
}
