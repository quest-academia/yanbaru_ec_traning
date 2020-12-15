<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TOrderDetail extends Model
{
    protected $table = 't_orders_details';

    public function order()
    {
        return $this->belongsTo('App\TOrder', 'id');
    }
}
