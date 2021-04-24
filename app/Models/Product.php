<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'm_products';
    
    public $timestamps = false;
    
    //商品追加
    protected $fillable = [
        'product_name',
        'description',
        'price',
    ];

    // Userモデルを親に持つことを明記
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Categoryモデルを親に持つことを明記
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // Sale_statusモデルを親に持つことを明記
    public function sale_status()
    {
        return $this->belongsTo('App\Models\Sale_status');
    }

    // Product_statusモデルを親に持つことを明記
    public function product_status()
    {
        return $this->belongsTo('App\Models\Product_status');
    }

    // Detailモデルを子に持つことを記述
    public function details()
    {
        //return $this->hasMany('App\Models\Detail');
    }

    // Purchaseモデルを子に持つことを記述
    public function purchases()
    {
        //return $this->hasMany('App\Models\Purchase');
    }
}