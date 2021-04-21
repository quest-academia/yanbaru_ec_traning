<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 't_orders';
    protected $dates = ['order_date'];

    public function orderDetails() {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }
}