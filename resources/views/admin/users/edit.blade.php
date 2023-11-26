@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @php
                                $name       = explode(" ", $user->name);
                                $first_name = $name[0];
                                $last_name  = $name[1];
                            @endphp
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name', $first_name) }}" name="first_name" placeholder="First name">
                                        @error('first_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror     
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name', $last_name) }}" name="last_name" placeholder="Last name">
                                        @error('last_name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $user->email) }}" name="email" placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone', $user->phone) }}" name="phone" placeholder="Phone">
                                        @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="iban">IBAN</label>
                                        <input type="text" class="form-control @error('iban') is-invalid @enderror" id="iban" value="{{ old('iban', $user->iban) }}" name="iban" placeholder="IBAN">
                                        @error('iban')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>              
                                    <div class="form-group col-md-6">
                                        <label for="commission">Commission</label>
                                        <input type="text" class="form-control @error('commission') is-invalid @enderror" id="commission" value="{{ old('commission', $user->commission) }}" name="commission" placeholder="Commission">
                                        @error('commission')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>              
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address', $user->address) }}" name="address" placeholder="1234 Main St">
                                    @error('address')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror  
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection