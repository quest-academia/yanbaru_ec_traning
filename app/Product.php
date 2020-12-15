<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $table = 'm_products';

    protected $fillable = [
        'order_detail_id',
        'products_id',
        'order_id',
        'shipment_status_id',
        'order_detail_number',
        'order_quantity',
        'shipment_date',
    ];

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }
}
