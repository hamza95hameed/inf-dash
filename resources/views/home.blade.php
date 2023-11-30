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
                    @slot('title') Total orders @endslot
                    @slot('count') {{ $ordersCount }} @endslot
                @endcomponent
                @if (auth()->user()->is_admin == 0)
                    @component('components.statistics.index')
                        @slot('title') Current balance @endslot
                        @slot('count') {{ @$current_balance }} @endslot
                    @endcomponent
                    @component('components.statistics.index')
                        @slot('title') Total earning @endslot
                        @slot('count') {{ @$total_earning }} @endslot
                    @endcomponent                    
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                @foreach ($orders as $item)
                    <div class="card">
                        <div class="card-header">
                            <h4>Top 5 orders</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($orders as $order)
                                <div class="mb-4">
                                    <div class="text-small float-right font-weight-bold text-muted">{{ $order->commission }}</div>
                                    <div class="font-weight-bold mb-1">{{ $order->order_no }}</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="{{ $percent ?? 50 }}%" aria-valuenow="{{ $percent ?? 50 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>            
                            @endforeach
                        </div>
                    </div>                                   
                @endforeach
            </div>
        </div>    
    </section>
@endsection
