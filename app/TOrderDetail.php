<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOrderDetail extends Model
{
    protected $table = 't_orders_details';

    public function t_orders()
    {
        return $this->belongsTo(TOrder::class);
    }

    public function products()
    {
        return $this->hasMany(MProduct::class);
    }
}
