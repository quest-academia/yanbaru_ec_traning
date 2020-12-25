<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'm_categories';

    protected $fillable = [
        'id',
        'category_name',
    ];

    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
