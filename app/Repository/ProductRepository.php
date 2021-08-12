<?php

namespace App\Repository;

interface ProductRepository{
  public function all();
  public function lastest();
  public function store($data);
  // public function update($topup);  
}