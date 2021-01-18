<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_user extends Model
{
    protected $fillable = [
            'password',
            'last_name',
            'first_name',
            'zipcode',
            'prefecture',
            'municipality',
            'address',
            'apartments',
            'email',
            'phone_number',
    ];
}
