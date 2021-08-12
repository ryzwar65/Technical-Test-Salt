<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function topupbalance()
    {
        return $this->morphOne('App\Models\TopupBalance', 'topupable');
    }
    
    public function productbalance()
    {
        return $this->morphOne('App\Models\ProductBalance', 'productable');
    }

    public function ordertopups()
    {
        return $this->morphMany('App\Models\OrderTopup', 'ordertopupable');
    }
    public function orderproducts()
    {
        return $this->morphMany('App\Models\OrderProduct', 'orderproductable');
    }
}
