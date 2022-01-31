<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->

<script src="../../bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="../../dist/js/adminlte.min.js"></script>

<!-- Sparkline -->

<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jvectormap  -->

<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- SlimScroll -->

<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- ChartJS -->

<script src="../../bower_components/chart.js/Chart.js"></script>

<!-- Select2 -->

<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- iCheck 1.0.1 -->

<script src="../../plugins/iCheck/icheck.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="../../dist/js/demo.js"></script>

<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {

        $('.select2').select2()

        $('#example1').DataTable()
        $('#datatable').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })

        //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

        //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

        //Money Euro
        // $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})

        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },

            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        /* $('#datepicker').datepicker({
        autoclose: true
        }) */

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })

        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        $("#regionCity").change(
            function(event){
                $.get("/getCountries/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#countryCity").empty();
                        $("#countryCity").append("<option value=''>Seleccione Pais</option>");
                        for(i=0;i<response.length;i++){
                            $("#countryCity").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                        } 
                    });
        })

        $("#countryCity").change(
            function(event){
                $.get("/getStates/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#stateCity").empty();
                        $("#stateCity").append("<option value=''>Seleccione Estado/Provincia</option>");
                        for(i=0;i<response.length;i++){
                            $("#stateCity").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                        } 
                    });
        })

        $("#stateCity").change(
            function(event){
                $.get("/getCities/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#city").empty();
                        $("#city").append("<option value=''>Seleccione Ciudad</option>");
                        for(i=0;i<response.length;i++){
                            $("#city").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                        } 
                    });
        })

        $("#sectorPosition").change(
            function(event){
                $.get("/getDepartments/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#departmentPosition").empty();
                        $("#departmentPosition").append("<option value=''>Seleccione Departamento</option>");
                        for(i=0;i<response.length;i++){
                            $("#departmentPosition").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                        } 
                    });
        })

        $("#folio_location_id").change(
            function(event){
                $.get("/getNumber/"+event.target.value+"", 
                    function(response,state){
                        $("#number").val(response[0].sequence);
                    }
                );
            }
        );

    });



</script>