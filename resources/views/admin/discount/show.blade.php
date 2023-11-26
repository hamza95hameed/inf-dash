@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Discount Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
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
                                    <label for="name">Discount name</label>
                                    <input type="text" class="form-control" readonly id="name" value="{{ $discount->name }}" name="name" placeholder="Discount name">    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" readonly id="amount" value="{{ $discount->amount }}" name="amount" placeholder="Amount"> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control" name="type" readonly id="type" value="{{ $discount->type }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user">User</label>
                                    <input type="text" class="form-control" name="user" readonly id="user" value="{{ $discount->user->name }}"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection