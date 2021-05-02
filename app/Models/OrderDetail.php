<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $table = 't_orders_details';
    protected $fillable = [
        'order_detail_number',
    ];

    public function order() {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function shipmentStatus() {
        return $this->belongsTo('App\Models\ShipmentStatus', 'shipment_status_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
