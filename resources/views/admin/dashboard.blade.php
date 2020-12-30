@extends('layouts.admin')

@section('content')

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<!-- begin #content -->
		<div id="content" class="content">

			<div class="row">

				<div class="col-md-12">

					@if(session('success'))

						<div class="col-md-offset-4 col-md-4 text-center">

							<p class="success-p-pay-signup">{{session('success')}}</p>

						</div>  

					@endif

					@if ($errors->any())
						<div class="alert alert-danger-payment">
							@foreach ($errors->all() as $error)
									<h5 class="error-payment-h5">Error</h5>
									<p class="error-payment">{{ $error }}</p>
							@endforeach
						</div>
					@endif

				</div>

				

				<div class="panel-body col-md-12">

					<h4 class="h4-unconfirmed">Unconfirmed Bank Transfer</h4>

					<div class="table-responsive">

						<table id="data-table-combine" class="table table-bordered myinvestment-table">
							<thead>
								<tr>
									<th class="text-nowrap">Name</th>
									<th class="text-nowrap">Reference ID</th>
									<th class="text-nowrap">Amount (₦)</th>
									<th class="text-nowrap">Plan range</th>
									<th class="text-nowrap">Date</th>
									<th class="text-nowrap">Image</th>
									@if (Auth::user()->person == 1)
										<th class="text-nowrap">Action</th>
									@endif	
									
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1; 
								@endphp

								@foreach($pending_bank_transfer as $pending_transfer)
	
									<tr class="odd gradeX">	
										<td>{{ $pending_transfer->first_name . " " . $pending_transfer->last_name }}</td>
										<td>{{ $pending_transfer->reference_id }}</td>
										<td>{{ number_format($pending_transfer->amount) }}</td>
										<td>{{ number_format($pending_transfer->min_amount) }} - {{ number_format($pending_transfer->max_amount) }}</td>
										<td>{{ $pending_transfer->created_at }}</td>
										<td>
											<a href={{asset("receipt/{$pending_transfer->image}")}} target="_blank">view image</a>
										</td>
										@if (Auth::user()->person == 1)
										<td class="with-btn">
											<form action="{{ route('approve.transfer') }}" method="post">
												@csrf
												<input type="text" hidden name="id"  value="{{$pending_transfer->id}}">
												<input type="text" hidden name="investment_plan_id"  value="{{$pending_transfer->investment_plan_id}}">
												<input type="text" hidden name="duration"  value="{{$pending_transfer->duration}}">
												<input type="text" hidden name="amount"  value="{{$pending_transfer->amount}}">
												<input type="text" hidden name="email"  value="{{$pending_transfer->email}}">
												<input type="text" hidden name="interest"  value="{{$pending_transfer->interest}}">
												<input type="text" hidden name="user_id"  value="{{$pending_transfer->user_id}}">
												<input type="text" hidden name="reference_id"  value="{{$pending_transfer->reference_id}}">

												<button
													onclick='return confirm("Do you want to approve this transaction?")'
													type="submit"
													class="btn btn-sm btn-primary admin-button">
													Approve
												</button>
											</form>

											<form action="{{ route('decline.transfer') }}" method="post">
												@csrf
												<input type="text" hidden name="id"  value="{{$pending_transfer->id}}">
												<input type="text" hidden name="investment_plan_id"  value="{{$pending_transfer->investment_plan_id}}">
												<input type="text" hidden name="duration"  value="{{$pending_transfer->duration}}">
												<input type="text" hidden name="amount"  value="{{$pending_transfer->amount}}">
												<input type="text" hidden name="email"  value="{{$pending_transfer->email}}">
												<input type="text" hidden name="interest"  value="{{$pending_transfer->interest}}">
												<input type="text" hidden name="user_id"  value="{{$pending_transfer->user_id}}">
												<input type="text" hidden name="reference_id"  value="{{$pending_transfer->reference_id}}">

												<button
													onclick='return confirm("Do you want to decline this transaction?")'
													type="submit"
													class="btn btn-sm btn-danger admin-button">
													Decline
												</button>
											</form>
											
										</td>

										@endif
										
									</tr>
								@php
									$i++; 
								@endphp
								
								@endforeach
							</tbody>
						</table>

					</div>


				</div>

			</div>

		</div>
		<!-- end #content -->

		

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>

@endsection