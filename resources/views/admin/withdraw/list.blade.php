@extends('layouts.admin.app')

@push('css')
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>Withdraw</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item">Withdraw</div>
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
										<th>Status</th>
										<th>Amount</th>
										<th>User</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										@foreach ($withdraws as $withdraw)
											<tr>
												<td class="text-center">{{ $withdraw->id }}</td>
												<td>{{ $withdraw->status }}</td>								
												<td>{{ $withdraw->amount }}</td>							
												<td>{{ $withdraw->user->name }}</td>								
												<td>
													<a href="{{ route('withdraws.edit', $withdraw->id) }}"><i class="fas fa-pen"></i></a>  
													<a href="{{ route('withdraws.show', $withdraw->id) }}"><i class="fas fa-eye"></i></a>  
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
			$('#discount-list-datatable').dataTable({
				"columnDefs": [
					{
						"targets": 4,
						"orderable": false
					}
				]
			});

		});
	</script>
@endpush