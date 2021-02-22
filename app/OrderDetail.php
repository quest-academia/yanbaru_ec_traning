<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 't_order_details';

    public $timestamps = false;
    
    protected $fillable = [
        'product_id',
        'order_id',
        'shipment_status_id',
        'order_quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function shipmentStatuses()
    {
        return $this->belongsTo('App\ShipmentStatus' , 'shipment_status_id');
    }

}
