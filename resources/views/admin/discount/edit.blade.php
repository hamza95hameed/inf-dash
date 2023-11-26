@extends('layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Discount</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Discount</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Discount name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $discount->name) }}" name="name" placeholder="Discount name">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror     
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" value="{{ old('amount', $discount->amount) }}" name="amount" placeholder="Amount">
                                        @error('amount')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="type">Type</label>
                                        <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                                            <option value="">Select type</option>
                                            <option value="fixed" {{ $discount->type == 'fixed' ? 'selected':''}}>Fixed</option>
                                            <option value="percentage" {{ $discount->type == 'percentage' ? 'selected':''}}>Percentage</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="user_id">User</label>
                                        <select name="user_id" class="form-control select2 @error('user_id') is-invalid @enderror" id="user_id">
                                            <option value="">Select user</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ $discount->user_id == $user->id ? 'selected': ''}}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
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

@push('script')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush