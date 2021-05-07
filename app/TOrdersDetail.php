<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TOrdersDetail extends Model
{
  public $timestamps = false;
  protected $table = 't_orders_details';

  public function order()
  {
    return $this->belongsTo(TOrder::class);
  }
}
