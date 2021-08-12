<?php

namespace App\Repository;

interface OrderTopupRepository{
  public function all();
  public function findById();
  public function store($data);
  // public function update($topup);  
}