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

					<h4 class="h4-unconfirmed">Create Trade Signals</h4>


					<form action="{{route('create.signal')}}" id="signal-form" method="post">

						@csrf

						<div class="row">

							<div class="form-group col-md-6">
								<label for="">Trade Type</label>
								<select name="trade_type" id="trade_type"  class="form-control">
									<option selected disabled>Choose an option</option>
									<option value="SPOT">SPOT</option>
									<option value="FUTURES">FUTURES</option>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="">Trade Action</label>
								<select name="trade_action" id="trade_action"  class="form-control">
									<option selected disabled>Choose an option</option>
									<option value="BUY">BUY</option>
									<option value="SELL">SELL</option>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="">Coin Type</label>
								<input type="text" name="coin_name" class="form-control" id="coin_type" placeholder="Example: BTC/USDT, ETH/USDT">
							</div>

							
							<div class="form-group col-md-6">
								<label for="">Entry Point</label>
								<input type="text" name="entry_point" class="form-control" id="entry_point" placeholder="Example: $4.35">
							</div>

							<div class="form-group col-md-6">
								<label for="">Exit point</label>
								<input type="text" name="exit_point" class="form-control" id="exit_point" placeholder="Example: $5.34">
							</div>

							<div class="form-group col-md-6">
								<label for="">Stop Loss</label>
								<input type="text" name="stop_loss" class="form-control" id="stop_loss" placeholder="Example: $3.94">
							</div>

							<div class="form-group col-md-12">
								<label for="">Additional Information</label>
								<textarea name="additional_info" id="" cols="30" rows="10" class="form-control"></textarea>
							</div>
							

						
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Create Signal</button>
						</div>

					</form>

			</div>

		</div>
		<!-- end #content -->

		

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>

@endsection