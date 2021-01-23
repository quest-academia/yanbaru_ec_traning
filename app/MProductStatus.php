<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProductStatus extends Model
{
    protected $table = 'm_products_statuses';

    public static function getLists()
    {
        $productStatuses = MProductStatus::pluck('product_status_name', 'id');

        return $productStatuses;
    }

    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
