<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSalesStatus extends Model
{
    public static function getLists()
    {
        $saleStatuses = MSalesStatus::pluck('sale_status_name', 'id');

        return $saleStatuses;
    }

    protected $table = 'm_sales_statuses';

    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
