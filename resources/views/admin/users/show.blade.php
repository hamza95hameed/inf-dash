@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
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
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control" readonly id="first_name" value="{{ $first_name }}" name="first_name" placeholder="First name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control" readonly id="last_name" value="{{ $last_name }}" name="last_name" placeholder="Last name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" readonly id="email" value="{{ $user->email }}" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" readonly id="phone" value="{{ $user->phone }}" name="phone" placeholder="Phone"> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="iban">IBAN</label>
                                    <input type="text" class="form-control" readonly id="iban" value="{{ $user->iban }}" name="iban" placeholder="IBAN">
                                </div>              
                                <div class="form-group col-md-6">
                                    <label for="commission">Commission</label>
                                    <input type="text" class="form-control" readonly id="commission" value="{{ $user->commission }}" name="commission" placeholder="Commission">
                                </div>              
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" readonly id="address" value="{{ $user->address }}" name="address" placeholder="1234 Main St">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection