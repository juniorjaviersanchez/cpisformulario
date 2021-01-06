<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


<!-- BEGIN DATATABLE --> 
      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
      <!--datables estilo bootstrap 4 CSS-->
      <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css">

<!--<END DATATABLE -->

<style>
    #table_id_filter{
        float: right;
    }
    
    #table_id_length{
        float: left;
    }
</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-20 p-r-20 p-t-62 p-b-33">

                <div class="container">
                    <table class="table table-bordered table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                
                                <th>ID Vaucher</th>
                            </tr>
                        </thead>
                        <tbody>

                        
                        </tbody>
                    </table>
                </div>



			
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- PARA LAS NOTIFICACIONES -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!--BEGIN DATATABLE -->
      <!-- datatables JS -->
      <script type="text/javascript" src="../../datatables/datatables.min.js"></script>

      <!-- para usar botones en datatables JS -->
      <script src="datatables/Buttons-1.6.5/js/dataTables.buttons.min.js"></script>
      <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
      <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
      <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
      <script src="datatables/Buttons-1.6.5/js/buttons.html5.min.js"></script>
<!--END DATATABLE -->

<script>

    $(document).ready(function(){
    
        listAlumno();

    });

    var listAlumno = function()
    {
        $('#table_id').DataTable({
            //Configuraciones básicas de dataTable
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },

            //Trabajar con ajax
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('listAlumno') }}",
            "columns":[
            {data:'id'},
            {data:'nombres'},
            {data:'apellidos'},
            {data:'username'},
        
            {data:'idvaucher'},
            ],

            //para usar los botones
            responsive: true,
            dom: 'Bfrtilp',     
            buttons: [
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generar PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generar Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generar CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copiar',
                    titleAttr: 'Copiar al portapapeles',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Imprimir',
                    titleAttr: 'Imprimir Tabla',
                    className: 'btn-outline-primary btn-sm'
                }
            ]

        });
    }

</script>

</body>
</html>