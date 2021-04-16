<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
    protected $table = 'm_shipment_statuses';

    public function orderDetails() {
        return $this->hasMany('App\Models\OrderDetail');
    }

}
