@extends('layouts.app')
@section('title','Product Balance')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Product Balance') }}</div>

              <div class="card-body">
                  <form action="{{route('product.save')}}" method="post">
                    @csrf
                    <div class="form-group row">
                      {{-- <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label> --}}

                        <div class="col-md-12">
                            <textarea name="product" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" placeholder="Product" required autocomplete="product" autofocus id="" cols="30" rows="10"></textarea>
                            @error('product')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        {{-- <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label> --}}
  
                          <div class="col-md-12">
                            <textarea name="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value="{{ old('shipping_address') }}" placeholder="Shipping Address" required autocomplete="shipping_address" autofocus id="" cols="30" rows="10"></textarea>
                            @error('shipping_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        {{-- <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label> --}}
  
                          <div class="col-md-12">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Price" required autocomplete="price" autofocus>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12 text-md-center">
                            <button type="submit" class="btn btn-primary my-2" style="width: 30%">
                                {{ __('Submit') }}
                            </button>
                        </div>
                      </div>  
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection