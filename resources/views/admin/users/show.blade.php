@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.user-detail') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">{{ __('messages.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ $user->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @php
                            $name       = explode(" ", $user->name);
                            $first_name = $name[0];
                            $last_name  = $name[1];
                        @endphp
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">{{ __('messages.first-name') }}</label>
                                    <input type="text" class="form-control" readonly id="first_name" value="{{ $first_name }}" name="first_name" placeholder="{{ __('messages.first-name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">{{ __('messages.last-name') }}</label>
                                    <input type="text" class="form-control" readonly id="last_name" value="{{ $last_name }}" name="last_name" placeholder="{{ __('messages.last-name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('messages.email') }}</label>
                                    <input type="email" class="form-control" readonly id="email" value="{{ $user->email }}" name="email" placeholder="{{ __('messages.email') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">{{ __('messages.phone') }}</label>
                                    <input type="tel" class="form-control" readonly id="phone" value="{{ $user->phone }}" name="phone" placeholder="{{ __('messages.phone') }}"> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="iban">{{ __('messages.iban') }}</label>
                                    <input type="text" class="form-control" readonly id="iban" value="{{ $user->iban }}" name="iban" placeholder="{{ __('messages.iban') }}">
                                </div>              
                                <div class="form-group col-md-3">
                                    <label for="city">{{ __('messages.city') }}</label>
                                    <input type="text" class="form-control" readonly id="city" value="{{ $user->city }}" name="city" placeholder="{{ __('messages.city') }}">
                                </div>              
                                <div class="form-group col-md-3">
                                    <label for="state">{{ __('messages.state') }}</label>
                                    <input type="text" class="form-control" readonly id="state" value="{{ $user->state }}" name="state" placeholder="{{ __('messages.state') }}">
                                </div>              
                                <div class="form-group col-md-6">
                                    <label for="zip-code">{{ __('messages.zip-code') }}</label>
                                    <input type="text" class="form-control" readonly id="zip-code" value="{{ $user->zip_code }}" name="zip-code" placeholder="{{ __('messages.zip-code') }}">
                                </div>              
                                <div class="form-group col-md-6">
                                    <label for="commission">{{ __('messages.commission') }}</label>
                                    <input type="text" class="form-control" readonly id="commission" value="{{ $user->commission }}" name="commission" placeholder="{{ __('messages.commission') }}">
                                </div>              
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('messages.address') }}</label>
                                <input type="text" class="form-control" readonly id="address" value="{{ $user->address }}" name="address" placeholder="1234 Main St">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection