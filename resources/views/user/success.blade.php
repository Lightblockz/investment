@extends('layouts.master')

@section('content')

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<!-- begin #content -->
		<div id="content" class="content">

            <div class="row">

				<div class="offset-md-3 col-md-6">

					<div class="row">                        

                        <div class="success-checkmark">
                            <div class="check-icon">
                              <span class="icon-line line-tip"></span>
                              <span class="icon-line line-long"></span>
                              <div class="icon-circle"></div>
                              <div class="icon-fix"></div>
                            </div>
                        </div>
                        
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