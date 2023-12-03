@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @php
                    $ordersCount = count($orders);
                @endphp
                @component('components.statistics.index')
                    @slot('color') B89270 @endslot
                    @slot('icon') fas fa-cart-plus @endslot
                    @slot('title') {{ __('messages.total-order') }} @endslot
                    @slot('count') {{ $ordersCount }} @endslot
                @endcomponent
                @if (auth()->user()->is_admin == 0)
                    @component('components.statistics.index')
                        @slot('color') B89270 @endslot
                        @slot('icon') fas fa-balance-scale @endslot
                        @slot('title') {{ __('messages.current-balance') }} @endslot
                        @slot('count') {{ @$current_balance }}€ @endslot
                    @endcomponent
                    @component('components.statistics.index')
                        @slot('color') B89270 @endslot
                        @slot('icon') fas fa-euro-sign @endslot
                        @slot('title') {{ __('messages.total-commission') }} @endslot
                        @slot('count') {{ @$total_earning }}€ @endslot
                    @endcomponent                    
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Top orders</h4>
                    </div>
                    <div class="card-body">
                        @if ($orders)
                            @foreach ($orders as $order)
                                @php
                                    $percent = ($order->commission / $orderSum) * 100;
                                @endphp
                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">{{ $order->commission }}</div>
                                    <div class="font-weight-bold mb-1">{{ $order->order_no }}</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="{{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>            
                            @endforeach                            
                        @endif
                    </div>
                </div>    
            </div>
        </div>    
    </section>
@endsection
