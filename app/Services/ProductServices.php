<?php

namespace App\Services;

use Auth;
use App\Repository\ProductRepository;

class ProductServices implements ProductRepository{
  public function all(){
    $topup = Auth::user();
    return $topup->productbalance()->with('orderproductable')->get();
  }
  public function store($data){
    $topup = Auth::user()->productbalance();
    $amount = $topup->first() ? $topup->first()->price : 0;    
    return $topup->updateOrCreate([
      'product'=>$data['product'],
      'price'=>$data['price'],
      'shipping_address'=>$data['shipping_address']
    ]);
  }

  public function lastest(){
    $topup = Auth::user();
    return $topup->productbalance()->orderBy('created_at','desc')->first();
  }
}