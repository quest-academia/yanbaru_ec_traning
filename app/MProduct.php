<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    protected $fillable = ['product_name', 'category_id', 'price'];

    public function category()
    {
        return $this->belongsTo(MCategory::class);
    }
}
