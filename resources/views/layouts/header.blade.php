
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Dashboard | Lightblocks</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> --}}
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700i&display=swap" rel="stylesheet">
	<link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/font-awesome/css/all.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/animate/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/default/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/default/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/default/theme/default.css') }}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{ asset('plugins/superbox/css/superbox.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/lity/dist/lity.min.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/AutoFill/css/autoFill.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/ColReorder/css/colReorder.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/KeyTable/css/keyTable.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/RowReorder/css/rowReorder.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/DataTables/extensions/Select/css/select.bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

	<!-- ================== BEGIN BASE JS ================== -->
	{{-- <script src="{{ asset('plugins/pace/pace.min.js') }}"></script> --}}
	<!-- ================== END BASE JS ================== -->


	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/nvd3/build/nv.d3.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<link href="{{ asset('plugins/nvd3/build/nv.d3.css') }}" rel="stylesheet" />

	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" id="theme" />

	<link href="{{ asset('css/main.css') }}" rel="stylesheet" id="theme" />
</head>

<body>
	@include('sweet::alert')
