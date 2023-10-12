@extends('loginlayout')

@section('content')

<div class="main-content">
    <!-- Header -->
    <div class="header py-5 pt-7">
      <div class="container">
        <div class="header-body text-center mb-7">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 mb-0">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-7">
          <div class="card border-0 mb-5">
            <div class="card-body pt-4 px-5">
              <div class="text-center text-dark mb-5">
                <h3 class="text-dark font-weight-bolder">{{__('Default Settlement Accounts')}}</h3>
                <span class="text-gray text-md">{{__('Settlements will be paid to this account')}}</span>
              </div>
              <form role="form" action="{{ route('add.bank')}}" method="post">
                @csrf
                <div class="form-group ">
                   <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">#</span>
                            </div>
                            <input class="form-control " placeholder="{{ __('Paymaya Account Number') }}" type="number" name="pay_acct_no"
							  >@error('pay_acct_no')
                                <span class="invalid-feedback input-group-text  text-danger text-sm bg-white border-0" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                             @enderror
                     </div>
					
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fad fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="{{ __('Paymaya Account Name') }}" type="text" name="pay_acct_name" >
					  @error('pay_acct_name')
                     <span class="invalid-feedback input-group-text  text-danger text-sm bg-white border-0" role="alert">
                     <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                  </div>
					
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">#</span>
                            </div>
                            <input class="form-control" placeholder="{{ __('Netbank Account Number') }}" type="number" name="net_acct_no" >
							 @error('net_acct_no')
                             <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fad fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="{{ __('Netbank Account Name') }}" type="text" name="net_acct_name">
					  @error('net_acct_name')
                      <span class="invalid-feedback" role="alert">
                     <strong >{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                </div>
                <div class="form-group">

                    <input class="form-control" placeholder="{{ __('Routing Number / Sort Code') }}" type="hidden" name="routing_number" value="{{ mt_rand(1000000000,9999999999)}}">

                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4 btn-block">{{__('Save Account')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop
