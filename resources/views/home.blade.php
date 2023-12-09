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
                @if (auth()->user()->is_admin == 1)
                    @component('components.statistics.index')
                        @slot('color') B89270 @endslot
                        @slot('icon') fas fa-euro-sign @endslot
                        @slot('title') {{ __('messages.total-commission') }} @endslot
                        @slot('count') {{ @$orderSum }}€ @endslot
                    @endcomponent    
                    @component('components.statistics.index')
                        @slot('color') B89270 @endslot
                        @slot('icon') fas fa-euro-sign @endslot
                        @slot('title') {{ __('messages.withdraw-request') }} @endslot
                        @slot('count') {{ @$withdrawCount }}€ @endslot
                    @endcomponent    
                @endif
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
                @component('components.charts.doughnuts')@endcomponent  
            </div>
        </div>    
    </section>
@endsection
