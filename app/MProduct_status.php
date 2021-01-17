<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct_status extends Model
{
    protected $table = 'm_products_statuses';

    public function getLists()
    {
        $product_statuses = MProduct_status::pluck('product_status_name', 'id');

        return $product_statuses;
    }

    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
