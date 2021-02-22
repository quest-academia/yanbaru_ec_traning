<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 't_orders';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail' , 'id');
    }


}
