@extends('layouts.auth.app')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="akhaia cosmetics" width="50%" height="auto">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header justify-content-between">
                            <h4>{{ __('messages.register') }}</h4>
                            <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="first_name">{{ __('messages.first-name') }}</label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" name="first_name" autofocus>
                                        @error('first_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.first-name')) ]) }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">{{ __('messages.last-name') }}</label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" name="last_name">
                                        @error('last_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.last-name')) ]) }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">{{ __('messages.email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.email')) ]) }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone">{{ __('messages.phone') }}</label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.phone')) ]) }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password">{{ __('messages.password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.password')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password_confirmation">{{ __('messages.password-confirmation') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.password-confirmation')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="city">{{ __('messages.city') }}</label>
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" name="city">
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.city')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="state">{{ __('messages.state') }}</label>
                                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" name="state">
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.state')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="zip_code">{{ __('messages.zip-code') }}</label>
                                        <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}" name="zip_code">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.zip-code')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="iban">{{ __('messages.iban') }}</label>
                                        <input id="iban" type="text" class="form-control @error('iban') is-invalid @enderror" value="{{ old('iban') }}" name="iban">
                                        @error('iban')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.iban')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="address">{{ __('messages.address') }}</label>
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ __('messages.required', ['type' => strtolower(__('messages.address')) ]) }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
