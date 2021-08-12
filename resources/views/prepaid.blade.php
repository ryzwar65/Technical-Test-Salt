@extends('layouts.app')
@section('title','Prepaid Balance')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Prepaid Balance') }}</div>

              <div class="card-body">
                  <form action="{{route('prepaid-balance.save')}}" method="post">
                    @csrf
                    <div class="form-group row">
                      {{-- <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label> --}}

                        <div class="col-md-12">
                            <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile Number" required autocomplete="mobile_number" autofocus>
                            @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        {{-- <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label> --}}
  
                          <div class="col-md-12">
                              <select name="value" id="value" class="form-control">                               
                                <option disabled @if (!old("value")) selected @endif>Choice Value</option>
                                <option value="10000" @if (old("value")==10000) selected @endif>Rp. 10.000,-</option>
                                <option value="50000" @if (old("value")==50000) selected @endif>Rp. 50.000,-</option>
                                <option value="100000" @if (old("value")==100000) selected @endif>Rp. 100.000,-</option>
                              </select>                              
                              @error('value')
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