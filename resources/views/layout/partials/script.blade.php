
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DATATABLE -->
<script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('theme/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('theme/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('theme/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('theme/bower_components/select2/dist/js/select2.js') }}"></script>

<script src="{{ asset('/theme/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('/theme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('/theme/dist/js/pages/dashboard.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">
    var table = $('#example2,#example3,#example4');
        table.DataTable();
    $('.numberonly').keypress(function (event) {
        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) ||
            (event.keyCode >= 96 && event.keyCode <= 105) ||
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault();
        //if a decimal has been added, disable the "."-button
    });

    $( document ).on( 'keypress', '.numberonly', function(e){
        var charCode = (e.which) ? e.which : e.keyCode
        if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;
    } );

    $('.datepicker').datepicker(
        {
            autoclose: true,
            todayHighlight: true,
            format:'dd/mm/yyyy'
        }
    );
    $('.cselect').select2();
</script>
