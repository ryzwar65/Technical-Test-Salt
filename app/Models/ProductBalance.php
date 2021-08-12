<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBalance extends Model
{
    //
    protected $guarded = [];

    public function productable(){
        $this->morphTo();
    }
    // public function orderproducts(){
    //     $this->morphToMany('App\Models\OrderProduct','orderproductable');
    // }
}
