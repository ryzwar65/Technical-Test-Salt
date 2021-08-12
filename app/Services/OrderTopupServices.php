<?php

namespace App\Services;

use Auth;
use App\Repository\OrderTopupRepository;

class OrderTopupServices implements OrderTopupRepository{
  public function all(){
    $topup = Auth::user();
    return $topup->ordertopups()->get();
  }
  public function store($data){
    $user = Auth::user(); 
    $topup = $user->topupbalance()->orderBy('created_at','desc')->first();
    $no = rand(1111111111,9999999999);
    $ppn = $data['value']*0.05;
    $price = (int) $data['value']+$ppn;
    $order = $user->ordertopups()->create([
      'order_no'=>$no,
      'topup_id'=>$topup->id,
      'total'=>$price,
      'date'=>\Carbon\Carbon::now('Asia/Jakarta'),      
    ]);
    return $order;
  }

  public function findById(){
    $topup = Auth::user();
    return $topup->whereHasMorph('ordertopupable','App\User',function (Builder $query) {
      $query->where('ordertopup_id', $id);
    })->get();
  }
}