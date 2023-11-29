@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $order->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="order_no">Order number</label>
                                    <input type="text" class="form-control" readonly id="order_no" value="{{ $order->order_no }}" name="order_no">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">User name</label>
                                    <input type="text" class="form-control" readonly id="name" value="{{ $order->user->name }}" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="discount_code">Discount code</label>
                                    <input type="text" class="form-control" readonly id="discount_code" value="{{ $order->discount->name }}" name="discount_code">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="commission">Commission</label>
                                    <input type="text" class="form-control" readonly id="commission" value="{{ $order->commission }}" name="commission"> 
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection