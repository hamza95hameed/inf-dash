@extends('layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create withdraw</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Withdraw</div>
            </div>
        </div>
        <div id="output-status">
            @if ($user->current_balance < 10)
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>×</span></button>
                        {{ __('messages.withdraw-error') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('withdraws.store') }}" method="POST">
                            @if ($user->current_balance > 10)
                                @csrf
                            @endif
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Withdraw name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $user->name) }}" name="name" placeholder="Withdraw name" readonly>
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" value="{{ $user->current_balance }}" name="amount" placeholder="Amount" readonly>
                                        @error('amount')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="iban">IBAN</label>
                                        <input type="text" class="form-control @error('iban') is-invalid @enderror" id="iban" value="{{ old('iban', $user->iban) }}" name="iban" placeholder="IBAN" readonly>
                                        @error('iban')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                @if ($user->current_balance > 10)
                                    <button type="submit" class="btn btn-primary">Withdraw</button> 
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection