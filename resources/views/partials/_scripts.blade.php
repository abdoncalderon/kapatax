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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

{{-- <script src="../../dist/js/pages/dashboard2.js"></script> --}}

<!-- AdminLTE for demo purposes -->

<script src="../../dist/js/demo.js"></script>

<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $('#example1').DataTable(
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
        });

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
    
    function checkHDMI()
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
    }

</script>
