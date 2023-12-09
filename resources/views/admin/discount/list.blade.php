@extends('layouts.admin.app')

@push('css')
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>Discounts</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item">Discounts</div>
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
								<table class="table table-striped" id="discount-list-datatable">
								<thead>                                 
									<tr>
										<th class="text-center">#</th>
										<th>Name</th>
										<th>Amount</th>
										<th>Type</th>
										<th>User</th>
										<th>Created</th>
										@if (auth()->user()->is_admin == 1)
											<th>Action</th>											
										@endif
									</tr>
									</thead>
									<tbody>
										@foreach ($discounts as $discount)
											<tr>
												<td class="text-center">{{ $discount->id }}</td>
												<td>{{ $discount->name }}</td>								
												<td>{{ $discount->amount }}</td>								
												<td>{{ $discount->type }}</td>								
												<td>{{ $discount->user->name }}</td>	
												<td>{{ date('Y-m-d', strtotime($discount->created_at)) }}</td>	
												@if (auth()->user()->is_admin == 1)
													<td>
														<a href="{{ route('discounts.edit', $discount->id) }}"><i class="fas fa-pen"></i></a>  
														<a href="{{ route('discounts.show', $discount->id) }}"><i class="fas fa-eye"></i></a>  
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
	<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('#discount-list-datatable').dataTable();
		});
	</script>
@endpush