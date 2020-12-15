<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 't_orders';

    protected $fillable = [
        'order_id',
        'user_id',
        'order_date',
    ];

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }
}
