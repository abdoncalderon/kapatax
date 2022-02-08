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

        $('#example1').DataTable({
        "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No hay resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "search":    "Buscar:",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "paginate": {
                                    "first":      "Primero",
                                    "last":       "Ultimo",
                                    "next":       "Siguiente",
                                    "previous":   "Anterior"
                                },
                    }
        })
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

        $("#region").change(
            function(event){

                $("#regionModal1Text").val($('#region option:selected').text())
                $("#regionModal1Id").val($('#region option:selected').val())

                $("#regionModal2Text").val($('#region option:selected').text())
                $("#regionModal2Id").val($('#region option:selected').val())

                $("#regionModal3Text").val($('#region option:selected').text())
                $("#regionModal3Id").val($('#region option:selected').val())

                /* $("#regionModal1 option[value="+event.target.value+"]").attr("selected",true)
                $("#regionModal1").trigger('change')
                $("#regionModal2 option[value="+event.target.value+"]").attr("selected",true) */

                $.get("/getCountries/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#country").empty();
                        $("#country").append("<option value=''>Seleccione Pais</option>");
                        for(i=0;i<response.length;i++){
                            $("#country").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                        } 
                    });
        })

        $("#country").change(
            function(event){

                $("#countryModal1Text").val($('#country option:selected').text())
                $("#countryModal1Id").val($('#country option:selected').val())

                $("#countryModal2Text").val($('#country option:selected').text())
                $("#countryModal2Id").val($('#country option:selected').val())

                $.get("/getStates/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#state").empty();
                        $("#state").append("<option value=''>Seleccione Estado/Provincia</option>");
                        for(i=0;i<response.length;i++){
                            $("#state").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                        } 
                    });
        })

        $("#state").change(
            function(event){
                
                $("#stateModal1Text").val($('#state option:selected').text())
                $("#stateModal1Id").val($('#state option:selected').val())

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

        $("#sector").change(
            function(event){

                $("#sectorModalText").val($('#sector option:selected').text())
                $("#sectorModalId").val($('#sector option:selected').val())

                $.get("/getDepartments/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#department").empty();
                        $("#department").append("<option value=''>Seleccione Departamento</option>");
                        for(i=0;i<response.length;i++){
                            $("#department").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
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

        $("#roleMenuIsActive").change(
            function(event){
                $.get("/changeStatus/"+event.target.value+"", 
                    function(response,state){
                        $("#menuIsActive").val(response[0].isActive);
                    }
                );
            }
        );

        var menues = $(".treeview"); 

        /* menues.click(
            function(event){
                var roleId = $(this).attr('id');
                $.get("/setOpen/"+roleId+"", 
                    function(response,state){
                        alert(response);
                    }
                );
            }
        ); */

        
    });



</script>