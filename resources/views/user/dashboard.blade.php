@extends('layouts.master')

@section('content')

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-lg-4 col-md-6">
					<div class="widget widget-stats bg-gradient-teal">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
						<div class="stats-content">
                            <div class="stats-title wallet-title">WALLET ID : {{$user->wallet->wallet_id}}</div>
                            {{-- <div class="stats-title">BALANCE:</div> --}}
							<div class="stats-number">₦ {{number_format($user->wallet->available_balance)}}</div>
						
							<div class="row">
                                <div class="col-md-6">
                                    <div class="stats-desc">
                                        {{-- <script src="https://js.paystack.co/v1/inline.js"></script>
                                        <button type="button" onclick="goFeature()" class="btn-get-started feature-subscribe-btn btn-block"> Pay now </button> --}}
                                        <a href="" class="btn btn-primary btn-block fundwallet">Fund Wallet</a>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="stats-desc">
                                        <a href="" class="btn btn-primary btn-block withdraw">Withdraw Fund</a>
                                    </div>
                                </div>
                            </div>

						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-4 col-md-6">
					<div class="widget widget-stats bg-gradient-blue">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">TOTAL INVESTED</div>
							@php
								$amount = 0;
								foreach ($user->investments as $key => $investment) {
									$amount = $amount + $investment->amount;
								}
							@endphp
							<div class="stats-number">₦ {{number_format($amount)}}</div>
				
							<div class="row">
                                <div class="col-md-6">
                                    
                                </div>
    
                                <div class="col-md-6">
                                    <div class="stats-desc">
                                        <a href="" data-toggle="modal" data-target="#invest-modal" class="btn btn-primary btn-block invest">Invest Now</a>
                                    </div>
                                </div>
                            </div>

						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-4 col-md-6">
					<div class="widget widget-stats bg-gradient-purple">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">TOTAL WITHDRAWAL</div>
							<div class="stats-number">38,900</div>
							<div class="stats-progress progress">
								<div class="progress-bar" style="width: 76.3%;"></div>
							</div>
							<div class="stats-desc">Better than last week (76.3%)</div>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				{{-- <div class="col-lg-3 col-md-6">
					<div class="widget widget-stats bg-gradient-black">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">NEW COMMENTS</div>
							<div class="stats-number">3,988</div>
							<div class="stats-progress progress">
								<div class="progress-bar" style="width: 54.9%;"></div>
							</div>
							<div class="stats-desc">Better than last week (54.9%)</div>
						</div>
					</div>
				</div> --}}
				<!-- end col-3 -->
			</div>
			<!-- end row -->

			
			<div class="row">

				<div class="panel-body col-md-12">

					<table id="data-table-combine" class="table table-bordered myinvestment-table">
						<thead>
							<tr>
								{{-- <th width="1%"></th> --}}
								<th class="text-nowrap">Reference ID</th>
								<th class="text-nowrap">Capital</th>
								<th class="text-nowrap">Interest Rate (%)</th>
								<th class="text-nowrap">Expected Monthly Income</th>
								<th class="text-nowrap">Total Withrawable Amount</th>
								<th class="text-nowrap">Interest Paid</th>
								<th class="text-nowrap">Start Date</th>
								<th class="text-nowrap">Close Date</th>
								<th class="text-nowrap">Status</th>
								
								
								
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1; 
							@endphp

							@foreach($user->investments as $investment)

								<tr class="odd gradeX">
									{{-- <td width="1%" class="f-s-600 text-inverse">{{ $i }}</td>	 --}}
									<td>{{ $investment->reference_id }}</td>
									<td>{{ $investment->amount }}</td>
									<td>{{ $investment->interest }}</td>
									<td>{{ $investment->expected_monthly_interest }}</td>
									<td>{{ $investment->total_withdrawable_amount }}</td>
									<td>{{ $investment->interest_paid }}</td>
									<td>{{ $investment->start_date }}</td>
									<td>{{ $investment->end_date }}</td>
									<td>{{ $investment->status }}</td>
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

	@include('modal._invest')

@endsection