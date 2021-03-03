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

					<h4 class="h4-unconfirmed">Unsent Trade Signals</h4>

					<div class="table-responsive">

						<table id="data-table-combine" class="table table-bordered myinvestment-table">
							<thead>
								<tr>
									<th class="text-nowrap">Trade Type</th>
									<th class="text-nowrap">Trade Action</th>
									<th class="text-nowrap">Coin Type</th>
									<th class="text-nowrap">Entry Point</th>
									<th class="text-nowrap">Exit Point</th>
                                    <th class="text-nowrap">Stop Loss</th>
                                    <th class="text-nowrap">Date Created</th>
									@if (Auth::user()->person == 1)
										<th class="text-nowrap">Action</th>
									@endif	
									
								</tr>
							</thead>
							<tbody>


								@foreach($signals as $signal)
	
									<tr class="odd gradeX">	
                                        <td>{{ $signal->trade_type }}</td>
                                        <td>{{ $signal->trade_action }}</td>
                                        <td>{{ $signal->coin_name }}</td>
                                        <td>{{ $signal->entry_point }}</td>
                                        <td>{{ $signal->exit_point }}</td>
                                        <td>{{ $signal->stop_loss }}</td>
                                        <td>{{ $signal->created_at }}</td>
                                        @if (Auth::user()->person == 1)
										<td class="with-btn">
                                            <a
													href="/admin/trade/signal/edit/{{ $signal->id }}"
													class="btn btn-sm btn-secondary admin-button">
													Edit
                                            </a>

                                            <a
													onclick='return confirm("Are you sure you want to send this trade signal?")'
													href="{{ route('send.signals', ['id' => $signal->id]) }}"
													class="btn btn-sm btn-danger admin-button">
													Send
                                            </a>

                                            <a
													href="/signal/view/{{ $signal->id }}"
													class="btn btn-sm btn-primary admin-button">
													View
                                            </a>
											
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
		<!-- end #content -->

		

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>

@endsection