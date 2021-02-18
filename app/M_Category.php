<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Category extends Model
{
    protected $fillable = ['category_name', 'id'];

    public function products()
        {
            return $this->hasMany(Product::class);
        }
}
