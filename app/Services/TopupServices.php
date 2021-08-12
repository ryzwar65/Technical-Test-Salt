<?php

namespace App\Services;

use Auth;
use App\Repository\TopupRepository;

class TopupServices implements TopupRepository{
  public function all(){
    $topup = Auth::user();
    return $topup->topupbalance()->with('ordertopupable')->get();
  }
  public function store($data){
    $topup = Auth::user()->topupbalance();
    $amount = $topup->first() ? $topup->first()->value : 0;    
    return $topup->updateOrCreate([
      'mobile_number'=>$data['mobile_number'],
      'value'=>$data['value'] + $amount
    ]);
  }

  public function lastest(){
    $topup = Auth::user();
    return $topup->topupbalance()->orderBy('created_at','desc')->first();
  }
}