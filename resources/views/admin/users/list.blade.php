@extends('layouts.admin.app')

@push('css')
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
	<section class="section">
		<div class="section-header">
			<h1>Users</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item">Users</div>
			</div>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="user-list-datatable">
								<thead>                                 
									<tr>
										<th class="text-center">#</th>
										<th>Name</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										@foreach ($users as $user)
											<tr>
												<td class="text-center">{{ $user->id }}</td>
												<td>{{ $user->name }}</td>								
												<td>
													<a href="{{ route('users.edit', $user->id) }}"><i class="fas fa-pencil"></i></a>  
													<a href="{{ route('users.show', $user->id) }}"><i class="fas fa-eye"></i></a>  
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
			$('#user-list-datatable').dataTable()
		});
	</script>
@endpush