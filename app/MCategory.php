<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    protected $fillable = ['category_name', 'id'];

    public function getLists()
    {
        $categories = MCategory::pluck('category_name', 'id');

        return $categories;
    }

    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
