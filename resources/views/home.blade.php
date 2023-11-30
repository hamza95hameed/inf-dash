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
                    @slot('count') 10 @endslot
                @endcomponent
                @component('components.statistics.index')
                    @slot('title') Total balance @endslot
                    @slot('count') 89 @endslot
                @endcomponent
                @component('components.statistics.index')
                    @slot('title') Total commission @endslot
                    @slot('count') 80 @endslot
                @endcomponent
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                @component('components.orders.top')
                    @slot('orders') {{ @$orders }} @endslot
                @endcomponent
            </div>
        </div>    
    </section>
@endsection
