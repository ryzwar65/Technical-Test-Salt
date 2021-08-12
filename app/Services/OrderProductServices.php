<?php

namespace App\Services;

use Auth;
use App\Repository\OrderProductRepository;

class OrderProductServices implements OrderProductRepository{
  public function all(){
    $topup = Auth::user();
    return $topup->orderproducts()->get();
  }
  public function store($data){
    $user = Auth::user(); 
    $topup = $user->productbalance()->orderBy('created_at','desc')->first();
    $no = rand(1111111111,9999999999);
    $ppn = $data['price']*0.05;
    $price = (int) $data['price']+$ppn;
    $order = $user->orderproducts()->create([
      'order_no'=>$no,
      'product_id'=>$topup->id,
      'total'=>$price,
      'date'=>\Carbon\Carbon::now('Asia/Jakarta'),      
    ]);
    return $order;
  }

  public function findById(){
    $topup = Auth::user();
    return $topup->whereHasMorph('orderproductable','App\User',function (Builder $query) {
      $query->where('orderproduct_id', $id);
    })->get();
  }
}