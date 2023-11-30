@extends('layouts.admin.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                @component('components.statistics.index')
                    @slot('title') Total orders @endslot
                    @slot('count') {{ count(@$orders) }} @endslot
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
                @component('components.orders.top')
                    @slot('orders') {{ @$orders }} @endslot
                @endcomponent
            </div>
        </div>    
    </section>
@endsection
