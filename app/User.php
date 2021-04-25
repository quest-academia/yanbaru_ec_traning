<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'm_users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

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
        'user_classification_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Productモデルを子に持つことを記述
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order');
    }
}
