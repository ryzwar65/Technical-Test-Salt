<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupBalance extends Model
{
    //

    protected $guarded = [];
    

    public function topupable(){
        $this->morphTo();
    }

    // public function ordertopups()
    // {
    //     return $this->morphToMany('App\Models\OrderTopup', 'ordertopupable');
    // }

    // public function ordertopup(){
    //     $this->morphToMany('App\Models\OrderTopup','ordertopupable');
    // }
}
