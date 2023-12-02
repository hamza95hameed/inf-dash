@extends('layouts.auth.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-breadcrumb">
                @include('components.language.language-switch')
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="akhaia cosmetics" width="50%" height="auto">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('messages.login') }}</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('messages.email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus />

                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.required', ['type' => strtolower(__('messages.email')) ]) }}</strong>
                                        </div>
                                    @enderror                                    
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">{{ __('messages.password') }}</label>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" />

                                    @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ __('messages.required', ['type' =>  strtolower(__('messages.password')) ]) }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        {{ __('messages.login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                       {{ __('messages.do-you-have-an-account' )}} <a href="{{ route('register') }}">{{ __('messages.create-an-account') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
