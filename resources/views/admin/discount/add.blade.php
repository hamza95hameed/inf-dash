@extends('layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.create-discount') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">{{ __('messages.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('messages.discounts') }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('discounts.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" placeholder="{{ __('messages.name') }}">
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror     
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="amount">{{ __('messages.amount') }}</label>
                                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" value="{{ old('amount') }}" name="amount" placeholder="{{ __('messages.amount') }}">
                                        @error('amount')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="type">{{ __('messages.type') }}</label>
                                        <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                                            <option value="">{{ __('messages.select-type') }}</option>
                                            <option value="fixed">{{ __('messages.fixed') }}</option>
                                            <option value="percentage">{{ __('messages.percentage') }}</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror  
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="user_id">{{ __('messages.user') }}</label>
                                        <select name="user_id" class="form-control select2 @error('user_id') is-invalid @enderror" id="user_id">
                                            <option value="">{{ __('messages.select-user') }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                                <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
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