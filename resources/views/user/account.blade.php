@extends('layouts.master')

@section('content')

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<!-- begin #content -->
		<div id="content" class="content">

            <div class="row">

				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="offset-md-3 col-md-6">

					<div class="row">

						<div class="col-md-12">

							<div class="form-group">
								<a href="" data-toggle="modal" data-target="#bank-account-modal" class="btn btn-primary btn-block add-acount">Add Bank Account</a>
							</div>

						</div>

					</div>
					
				</div>

				
				<div class="table-responsive bank-account-table">

					<table id="data-table-combine" class="table table-bordered myinvestment-table">
						<thead>
							<tr>
								<th class="text-nowrap">Bank Name</th>
								<th class="text-nowrap">Account Name</th>
								<th class="text-nowrap">Account Number</th>
								<th class="text-nowrap">Account Type</th>
								<th class="text-nowrap">Action</th>
								
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1; 
							@endphp

							@foreach($user->bankAccount as $bankAccount)
								
							<tr class="odd gradeX">
								<td>{{ $bankAccount->bank_name }}</td>
								<td>{{ $bankAccount->account_name }}</td>
								<td>{{ $bankAccount->account_number }}</td>
								<td>{{ $bankAccount->account_type }}</td>
								<td class="with-btn" nowrap="">
									<a href="/management/user/edit/{{ $bankAccount->id }}" class="btn btn-sm btn-primary width-60 m-r-2">Edit</a>
									<a
									onclick='return confirm("Are you sure you want to delete this account details?")'
									href="/user/bank/account/delete/{{ $bankAccount->id }}" class="btn btn-sm btn-white width-60">Delete</a>
								</td>
							</tr>

							@endforeach
							


						</tbody>
					</table>

				</div>


            </div>
			
		</div>
		<!-- end #content -->

		

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	@include('modal._addacount')
@endsection