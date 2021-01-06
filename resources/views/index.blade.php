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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">

			
				{!! Form::open([ 'url'=> '/posts/', 'method'=>'POST', 'id'=> 'form1','class'=>'login100-form validate-form flex-sb flex-w', 'files'=>'true'] ) !!}

					<span class="login100-form-title p-b-15">
						Registro de Usuarios
					</span>

					<!-- Para mostrar los errores con ajax-->
					<div id='message-error' class="alert alert-danger danger" role='alert' style="display: none;width: 100%;">
						<strong id="error"></strong>
					</div>
					<br>

					<!-- PARA EL TOKEN y EL ID-->
					<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <input type="hidden" id="id">

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Nombres
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Nombres son requerido">
						<input class="input100" type="text" id="nombres" name="nombres" value="{{old('username')}}" maxlength="20">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Apellidos
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" id="apellidos" name="apellidos" value="{{old('apellidos')}}" maxlength="20">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Usuario
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" id="username" name="username" value="{{old('username')}}" maxlength="15">
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Contraseña
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" value="{{old('password')}}" maxlength="15">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Id Vaucher
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="text" id="idvaucher" name="idvaucher" value="{{old('idvaucher')}}" maxlength="10">
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Foto Vaucher
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required" style="overflow: hidden;">
						<input class="input100" type="file" id="imgvaucher" name="imgvaucher" value="{{old('imgvaucher')}}" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						
						{!!link_to('#',$title='Guardar',$attributes = ['id'=>'Grabar','class'=>'login100-form-btn'])!!}
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
						¿No es un miembro?
						</span>

						<a href="#" class="txt2 bo1">
						Regístrate ahora
						</a>
					</div>
				{!! Form::close() !!}
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

<script>

	//PARA GUARDAR 
    $("#Grabar").click(function(event)
    {
            var nombres = $("#nombres").val();
            var apellidos = $("#apellidos").val();
            var username = $("#username").val(); 
            var password = $("#password").val();
			var idvaucher = $("#idvaucher").val();
			var imgvaucher = $("#imgvaucher").val();

			var formData = new FormData($('#form1')[0]);

            var token = $("input[name=_token]").val();

            var route = "{{route('alumno.store')}}";
            
          $.ajax({
            url:route,
            headers:{'X-CSRF-TOKEN':token},
            type:'post',
            datatype: 'json',
            //async: false,
			contentType: false,
            processData: false,
            data: formData,
						
            success:function(data)
            {
                if(data.success == 'true')
                {
					$("#message-error").hide();
					if (data.status == 422) {
						console.clear();
					}

                    //Para La notificación
                    Swal.fire(
						'¡Buen trabajo!',
						'¡Estás Registrado!',
						'success'
					)

                    //Para resetear el Formulario
					document.getElementById("form1").reset();
                }
            },
            error:function(data)
            {
                $errorres = (data.responseJSON.errors.nombres ? data.responseJSON.errors.nombres+"</br>": "")+
                           (data.responseJSON.errors.apellidos ? data.responseJSON.errors.apellidos+"</br>": "")+
                           (data.responseJSON.errors.username ? data.responseJSON.errors.username+"</br>": "")+
                           (data.responseJSON.errors.password ? data.responseJSON.errors.password+"</br>": "")+
						   (data.responseJSON.errors.idvaucher ? data.responseJSON.errors.idvaucher+"</br>": "")+
                           (data.responseJSON.errors.imgvaucher ? data.responseJSON.errors.imgvaucher+"</br>": "");
                $("#error").html($errorres);
                $("#message-error").fadeIn();
                if (data.status == 422) {
                	console.clear();
                }
              

            }  
          })
    });  


	

</script>

</body>
</html>