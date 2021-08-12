<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTopup extends Model
{
    //
    protected $guarded = [];

    // public function ordertopupable(){
    //     $this->morphTo();
    // }

    public function ordertopupable(){
        $this->morphTo();
    }

    public function format(){
        return [
            "order_no"=>$this->order_no,
            "total"=>$this->tota,
            "date"=>$this->date,
            'status'=>$this->status
        ];
    }
}
