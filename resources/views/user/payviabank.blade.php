@extends('layouts.master')

@section('content')

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<!-- begin #content -->
		<div id="content" class="content">

            <div class="row">

				<div class="offset-md-3 col-md-6">

					<div class="row">

                        

                        @if(session('success'))

                            <div class="text-center">

                                <img src="{{ asset('img/success.gif') }}" class="img-responsive success-gif" alt="">

                                <p class="success-p-pay">{{session('success')}}</p>

                                <a href="{{route('dashboard')}}" class="btn btn-primary pay-go-dashboard">Go to Dashboard</a>

                            </div>  

                        @else

                            @if ($errors->any())
                                <div class="alert alert-danger-payment">
                                    @foreach ($errors->all() as $error)
                                            <h5 class="error-payment-h5">Error</h5>
                                            <p class="error-payment">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="col-md-12" style="color:#fff">

                                <div class="form-group">
                                    <h3 class="" style="color:#ecb82e">Pay Via Bank Transfer</h3>
                                </div>
                                
                                <div class="paybank-div">

                                    <h5>You are one more step away from completing your transaction. Please follow the instruction below:</h5>

                                    <form action="{{route('investbank')}}" role="form" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input type="text" hidden name="email" value="{{Session::get('bank_transfer')['review-user-email']}}" id="">
                                        <input type="text" hidden name="amount" value="{{Session::get('bank_transfer')['amount']}}" id="">
                                        <input type="text"hidden  name="plan_amount" value="{{Session::get('bank_transfer')['plan_amount']}}" id="">
                                        <input type="text" hidden name="plan_duration" value="{{Session::get('bank_transfer')['plan_duration']}}" id="">
                                        <input type="text" hidden name="interest" value="{{Session::get('bank_transfer')['interest']}}" id="">

                                        <ul class="paybank-ul">
                                            <li>
                                                Pay the sum of ₦ {{ number_format(Session::get('bank_transfer')['amount']) }} into the account below:
                                                <br><br>
                                                <span class="bank-span"><span class="bank-span-inner">Account Number:</span> 0238082884 </span>
                                                <br>
                                                <span class="bank-span"><span class="bank-span-inner">Account Name:</span> T-Oak Soteria Ltd.</span>
                                                <br>
                                                <span class="bank-span"><span class="bank-span-inner">Bank:</span> Guaranty Trust Bank</span>
                                            </li>
                                            <li>
                                                Upload your proof of payment by clicking the button below
                                                <br>
                                                <input type="file" name="receipt" class="btn btn-primary btn-block upload-button">
                                                <small>valid file formats (.png , .jpg, .jpeg)</small>
                                            </li>
                                            <div>
                                                <button type="submit" class="btn btn-primary pull-right btn-complete">Complete</button>
                                            </div>
                                        </ul>

                                    </form>
            
                                </div>

                            </div>

                        @endif

						

					</div>
					
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