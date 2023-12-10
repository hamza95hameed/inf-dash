@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.create-user') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">{{ __('messages.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('messages.user') }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">{{ __('messages.first-name') }}</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}" name="first_name" placeholder="{{ __('messages.first-name') }}">
                                        @error('first_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror     
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">{{ __('messages.last-name') }}</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name') }}" name="last_name" placeholder="{{ __('messages.last-name') }}">
                                        @error('last_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">{{ __('messages.email') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" placeholder="{{ __('messages.email') }}">
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">{{ __('messages.phone') }}</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}" name="phone" placeholder="{{ __('messages.phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">{{ __('messages.password') }}</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" name="password" placeholder="{{ __('messages.password') }}">
                                        @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation">{{ __('messages.password-confirmation')}}</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="{{ __('messages.password-confirmation')}}">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="iban">{{ __('messages.iban') }}</label>
                                        <input type="text" class="form-control @error('iban') is-invalid @enderror" id="iban" value="{{ old('iban') }}" name="iban" placeholder="{{ __('messages.iban') }}">
                                        @error('iban')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>           
                                    <div class="form-group col-md-3">
                                        <label for="city">{{ __('messages.city') }}</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" value="{{ old('city') }}" name="city" placeholder="{{ __('messages.city') }}">
                                        @error('city')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label for="state">{{ __('messages.state') }}</label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" value="{{ old('state') }}" name="state" placeholder="{{ __('messages.state') }}">
                                        @error('state')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="zip_code">{{ __('messages.zip-code') }}</label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" value="{{ old('zip_code') }}" name="zip_code" placeholder="{{ __('messages.zip-code') }}">
                                        @error('zip_code')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>    
                                    <div class="form-group col-md-6">
                                        <label for="address">{{ __('messages.address') }}</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address') }}" name="address" placeholder="1234 Main St">
                                        @error('address')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="commission">{{ __('messages.commission') }}</label>
                                        <input type="text" class="form-control @error('commission') is-invalid @enderror" id="commission" value="{{ old('commission') }}" name="commission" placeholder="{{ __('messages.commission') }}">
                                        @error('commission')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>              
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection