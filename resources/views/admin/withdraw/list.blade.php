@extends('layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.withdraws') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">{{ __('messages.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('messages.withdraws') }}</div>
            </div>
        </div>
        <div id="output-status">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>×</span></button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="withdraw-list-datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>{{ __('messages.status') }}</th>
                                            <th>{{ __('messages.amount') }}</th>
                                            <th>{{ __('messages.user') }}</th>
                                            <th>{{ __('messages.completed-at') }}</th>
                                            <th>{{ __('messages.created') }}</th>
                                            @if (auth()->user()->is_admin == 1)
                                                <th>{{ __('messages.action')}}</th>                                                
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdraws as $withdraw)
                                            @php
                                                $status = $withdraw->status == 'pending' ? '<div class="badge badge-danger">' . __('messages.'.$withdraw->status) . '</div>' : '<div class="badge badge-success">' .__( 'messages.'.$withdraw->status) . '</div>';
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $withdraw->id }}</td>
                                                <td>{!! $status !!}</td>
                                                <td>{{ $withdraw->amount }}€</td>
                                                <td>{{ $withdraw->user->name }}</td>
                                                <td>{{ $withdraw->completed_at != null ? date('Y-m-d', strtotime($withdraw->completed_at)) : 'NULL'}}</td>
                                                <td>{{ date('Y-m-d', strtotime($withdraw->created_at)) }}</td>
                                                @if (auth()->user()->is_admin == 1)
                                                    <td>
                                                        <div class="dropdown d-inline mr-2">
                                                            <button class="btn btn-primary dropdown-toggle {{ $withdraw->status == 'complete' && $withdraw->completed_at != null ? 'disabled': ''}}" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                {{ __('messages.action')}}
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" id="mark-as-completed" data-id="{{ $withdraw->id }}" href="javascript:void(0)">{{ __('messages.mark-as-completed') }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#withdraw-list-datatable').dataTable();

            $(document).on('click', '#mark-as-completed', function(){
                let withdrawId = $(this).attr('data-id');
                let route      = "{{ route('withdraws.update', ':withdrawId') }}";
                route = route.replace(':withdrawId', withdrawId)

                $.ajax({
                    type: "PUT",
                    url: route,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        window.location.reload()
                    }
                });
            })
        });
    </script>
@endpush