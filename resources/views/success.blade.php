@extends('layouts.app')
@section('title','Success Order')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          @php
              $data = Session::get('data');
          @endphp
          <div class="card">
              <div class="card-header">{{ __('Success Order') }}</div>              
              <div class="card-body">
                  <h3>Success!</h3>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>Order. no</div>
                    <div>{{$data->order_no}}</div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>Total</div>
                    <div>{{$data->total}}</div>
                  </div>
                  <br><br>
                  @if ($data->type == "topup")                      
                    Your mobile phone number {{$data->mobile_number}} will 
                    receive Rp {{$data->value}}
                  @else
                  {{$data->product}} that costs {{$data->price}} will be 
                  shipped to :
                  {{$data->shipping_address}}
                  only after you pay
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>
@endsection