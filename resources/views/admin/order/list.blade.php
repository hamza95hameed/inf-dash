@extends('layouts.admin.app')

@push('css')
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>Orders</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item">Orders</div>
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
	<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('#order-list-datatable').dataTable({
				"columnDefs": [
					{
						"targets": 5,
						"orderable": false
					}
				]
			});

		});
	</script>
@endpush