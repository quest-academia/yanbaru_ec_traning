<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Category extends Model
{

    protected $table = 'm_categories';

    public function getLists()
    {
        $categories = M_Category::pluck('category_name', 'id');

        return $categories;
    }

    public function products()
    {
        return $this->hasMany('App\M_Product');
    }
}
