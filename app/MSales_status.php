<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSales_status extends Model
{
    protected $table = 'm_sales_statuses';

    public function getLists()
    {
        $sales_statuses = MSales_status::pluck('sale_status_name', 'id');

        return $sales_statuses;
    }

    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
