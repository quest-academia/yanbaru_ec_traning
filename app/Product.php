<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'm_products';

    public $timestamps = false; 
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function saleStatus()
    {
        return $this->belongsTo('App\SaleStatus');
    }

    public function productStatus()
    {
        return $this->belongsTo('App\ProductStatus');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }


}
