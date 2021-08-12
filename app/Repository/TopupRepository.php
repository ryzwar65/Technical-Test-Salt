<?php

namespace App\Repository;

interface TopupRepository{
  public function all();
  public function lastest();
  public function store($data);
  // public function update($topup);  
}