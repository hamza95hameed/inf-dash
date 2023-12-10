@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.discount-details') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">{{ __('messages.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ $discount->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('messages.name') }}</label>
                                    <input type="text" class="form-control" readonly id="name" value="{{ $discount->name }}" name="name">    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="amount">{{ __('messages.amount') }}</label>
                                    <input type="text" class="form-control" readonly id="amount" value="{{ $discount->amount }}" name="amount"> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="type">{{ __('messages.type') }}</label>
                                    <input type="text" class="form-control" name="type" readonly id="type" value="{{ $discount->type }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user">{{ __('messages.user') }}</label>
                                    <input type="text" class="form-control" name="user" readonly id="user" value="{{ $discount->user->name }}"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection