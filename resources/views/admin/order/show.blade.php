@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.order-detail') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">{{ __('messages.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ $order->order_no }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="order_no">{{ __('messages.order-number') }}</label>
                                    <input type="text" class="form-control" readonly id="order_no" value="{{ $order->order_no }}" name="order_no">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('messages.name') }}</label>
                                    <input type="text" class="form-control" readonly id="name" value="{{ $order->user->name }}" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="discount_code">{{ __('messages.discount-code') }}</label>
                                    <input type="text" class="form-control" readonly id="discount_code" value="{{ $order->discount->name }}" name="discount_code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="commission">{{ __('messages.commission') }}</label>
                                    <input type="text" class="form-control" readonly id="commission" value="{{ $order->commission }}" name="commission"> 
                                </div>    
                                <div class="form-group col-md-6">
                                    <label for="order_created_at">{{ __('messages.order-created-at') }}</label>
                                    <input type="text" class="form-control" readonly id="order_created_at" value="{{ date('Y-m-d' , strtotime($order->order_created_at)) }}" name="order_created_at"> 
                                </div>    
                                <div class="form-group col-md-6">
                                    <label for="created">{{ __('messages.created') }}</label>
                                    <input type="text" class="form-control" readonly id="created" value="{{ date('Y-m-d' , strtotime($order->created_at)) }}" name="created"> 
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection