<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--[if lt IE 9]>
  <script src="../assets/crossbrowserjs/html5shiv.js"></script>
  <script src="../assets/crossbrowserjs/respond.min.js"></script>
  <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js')  }}"></script>
<script src="{{ asset('plugins/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('js/theme/default.min.js') }}"></script>
<script src="{{ asset('js/apps.min.js')}}"></script>
<!-- ================== END BASE JS ================== -->


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('plugins/nvd3/build/nv.d3.js') }}"></script>
<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
<script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset('js/demo/dashboard-v2.min.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('js/demo/table-manage-default.demo.min.js') }}"></script>
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('js/demo/table-manage-combine.demo.min.js') }}"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  
  <script src="{{ asset('js/payment.js') }}"></script>

<script>
  $(document).ready(function() {
    App.init();
    DashboardV2.init();
    TableManageCombine.init();
  });
</script>



</body>
</html>
