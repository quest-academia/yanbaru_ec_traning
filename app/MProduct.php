<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(MCategory::class);
    }
}
