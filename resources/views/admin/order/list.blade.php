@extends('layouts.admin.app')

@push('css')
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>{{ __('messages.order') }}</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">{{ __('messages.dashboard') }}</a></div>
				<div class="breadcrumb-item">{{ __('messages.order') }}</div>
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
								<table class="table table-striped" id="order-list-datatable">
								<thead>                                 
									<tr>
										<th class="text-center">#</th>
										<th>{{ __('messages.order-number') }}</th>
										<th>{{ __('messages.user-name') }}</th>
										<th>{{ __('messages.discount-code') }}</th>
										<th>{{ __('messages.commission') }}</th>
										<th>{{ __('messages.order-created-at') }}</th>
										<th>{{ __('messages.created') }}</th>
										<th>{{ __('messages.action') }}</th>
									</tr>
									</thead>
									<tbody>
										@foreach ($orders as $order)
											<tr>
												<td class="text-center">{{ $order->id }}</td>
												<td>{{ $order->order_no }}</td>								
												<td>{{ $order->user->name }}</td>								
												<td>{{ $order->discount->name }}</td>								
												<td>{{ $order->commission }}</td>	
												<td>{{ date('Y-m-d', strtotime($order->order_created_at)) }}</td>	
												<td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>							
												<td>
													<a href="{{ route('orders.show', $order->id) }}"><i class="fas fa-eye"></i></a>  
												</td>	
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
		$(document).ready(function () {
			$('#order-list-datatable').dataTable();
		});
	</script>
@endpush