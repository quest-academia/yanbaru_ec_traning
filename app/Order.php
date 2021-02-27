<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 't_orders';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'order_date'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function orderDetails()
    {
        return $this->hasMany('OrderDetail::class');
    }
}
