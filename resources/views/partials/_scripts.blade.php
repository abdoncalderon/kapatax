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
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

        //Money Euro
        $('[data-mask]').inputmask()

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
        $('#datepicker').datepicker({
        autoclose: true
        })

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

        

        

        /* $('#example1').DataTable(
           {
            "sFilterInput": "form-control",
            "oPaginate":{
                    "sPrevious": "Anterior",
                    "sNext": "Proximo",
                },
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nothing found - sorry",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtradas de _MAX_ registros totales)",
                
                "sSearch": "Buscar:",
            },
        });

        $('#example2').DataTable(
           {
            "sFilterInput": "form-control",
            "oPaginate":{
                    "sPrevious": "Anterior",
                    "sNext": "Proximo",
                },
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nothing found - sorry",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtradas de _MAX_ registros totales)",
                
                "sSearch": "Buscar:",
            },
        });

        $('#example3').DataTable(
           {
            "sFilterInput": "form-control",
            "oPaginate":{
                    "sPrevious": "Anterior",
                    "sNext": "Proximo",
                },
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nothing found - sorry",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtradas de _MAX_ registros totales)",
                
                "sSearch": "Buscar:",
            },
        });

        $('#example4').DataTable(
           {
            "sFilterInput": "form-control",
            "oPaginate":{
                    "sPrevious": "Anterior",
                    "sNext": "Proximo",
                },
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nothing found - sorry",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtradas de _MAX_ registros totales)",
                
                "sSearch": "Buscar:",
            },
        }); */

        /* $("#brandsComputer").change(
            function(event){
                $.get("/getModelsComputer/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#model").empty();
                        for(i=0;i<response.length;i++){
                            $("#model").append("<option value='"+response[i].name+"'> "+response[i].name+"</option>");
                        } 
                    });
        }); */

        /* $("#brandsMonitor").change(
            function(event){
                $.get("/getModelsMonitor/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#model").empty();
                        for(i=0;i<response.length;i++){
                            $("#model").append("<option value='"+response[i].name+"'> "+response[i].name+"</option>");
                        } 
                    });
        }); */

        /* $("#brandsPrinter").change(
            function(event){
                $.get("/getModelsPrinter/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#model").empty();
                        for(i=0;i<response.length;i++){
                            $("#model").append("<option value='"+response[i].name+"'> "+response[i].name+"</option>");
                        } 
                    });
        }); */

        /* $("#brandsOther").change(
            function(event){
                $.get("/getModelsOther/"+event.target.value+"", 
                    function(response,state){
                        console.log(response);
                        $("#model").empty();
                        for(i=0;i<response.length;i++){
                            $("#model").append("<option value='"+response[i].name+"'> "+response[i].name+"</option>");
                        } 
                    });
        }); */

        /* $("#print").click(
            function(){
                $('.container').printThis();
            }
        ); */

        $("#location_id").change(
            function(event){
                $.get("/getNumber/"+event.target.value+"", 
                    function(response,state){
                        $("#number").val(response[0].sequence);
                    }
                );
            }
        );

        $("#add-equipment").click(
            function(event){
                var id = $("#equipment").val();
                var quantity = $("#quantity").val();
                var markup = "<tr><td>"+id+"</td><td></td><td>"+quantity+"</td><td><button id='delete-equipment' type='button'>{{ __('content.delete') }}</button></td></tr>";
                $("#equipments tbody").append(markup);
            }
        );

        $("#delete-equipment").click(
            function(event){
                $(this).parents("tr").remove();
            }
        );

        $("#add-position").click(
            function(event){
                var id = $("#position").val();
                var quantity = $("#quantity").val();
                var markup = "<tr><td>"+id+"</td><td></td><td>"+quantity+"</td><td><button id='delete-position' type='button'>{{ __('content.delete') }}</button></td></tr>";
                $("#positions tbody").append(markup);
            }
        );
        
     });

     
    
    /* function checkHDMI()
    {
        if (document.getElementById('hdmi').checked) 
        {
            document.getElementById('hdmi').value = 1;
        } else {
            document.getElementById('hdmi').value = 0;
        }
    }

    function checkVGA()
    {
        if (document.getElementById('vga').checked) 
        {
            document.getElementById('vga').value = 1;
        } else {
            document.getElementById('vga').value = 0;
        }
    }

    function checkDP()
    {
        if (document.getElementById('dp').checked) 
        {
            document.getElementById('dp').value = 1;
        } else {
            document.getElementById('dp').value = 0;
        }
    }

    function checkBLACK()
    {
        if (document.getElementById('black').checked) 
        {
            document.getElementById('black').value = 1;
        } else {
            document.getElementById('black').value = 0;
        }
    }


    function checkCOLOR()
    {
        if (document.getElementById('color').checked) 
        {
            document.getElementById('color').value = 1;
        } else {
            document.getElementById('color').value = 0;
        }
    }

    function checkUSB()
    {
        if (document.getElementById('usb').checked) 
        {
            document.getElementById('usb').value = 1;
        } else {
            document.getElementById('usb').value = 0;
        }
    }

    function checkETHERNET()
    {
        if (document.getElementById('ethernet').checked) 
        {
            document.getElementById('ethernet').value = 1;
        } else {
            document.getElementById('ethernet').value = 0;
        }
    }
    
    function checkWIFI()
    {
        if (document.getElementById('wifi').checked) 
        {
            document.getElementById('wifi').value = 1;
        } else {
            document.getElementById('wifi').value = 0;
        }
    }

    function checkSTATUS()
    {
        if (document.getElementById('status').checked) 
        {
            document.getElementById('status').value = 1;
        } else {
            document.getElementById('status').value = 0;
        }
    } */

</script>
