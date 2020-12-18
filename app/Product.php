<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $table = 'm_products';
    
    //いる？
    protected $fillable = [
        'id',
        'product_name',
        'category_id',
        'price',
        'desecription',
        'sale_status_id',
        'regist_date',
        'user_id',
        'delete_flag',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //この記載の意味は？fillableとどちらかで良い？
    //protected $guarded = array('id');

    //public $timestamps = false;

    public function getData(){
        //ここの$dataはどこで使う？条件絞りたい時に使う？
        $data = DB::table($this->table)->get();
        return $data;
    }

}
