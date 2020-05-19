<?php
session_start();
error_reporting(0); // No mostrar los errores 
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo ' El registro ha terminado';
die();
}else {

?>




<?php include '../Conexion/conexion2.php';
$conexion=conexion();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	 <?php include '../navegacion/navegacion.php'; ?>
</head>

<style>
  img {
    
    opacity: 0.8;
    height: 100%;
    width: 100%;
    position:absolute;
    
  }
</style>

<body>
<img src="../img/logo2.png" >
<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-md-2">
				</div>
				<div class="col-md-4">

				<div class="modal-footer display-footer" id="respuesta"></div>
					
					<form  role="form">

					<fieldset>
            <legend class="text-center header">Registro de Datos</legend>

						<div class="form-group"> 
							 <span ><i class="fa fa-user bigicon"></i></span>
							<label for="nombres">
								Nombres:
							</label>
							<input type="text" class="form-control" id="nombres" minlength="4"   />
                        </div>
                        <div class="form-group">


							<label for="apellidos">
								 <span ><i class="fa fa-user bigicon"></i></span>
								Apellidos:
							</label>
							<input type="text" class="form-control" id="apellidos" minlength="4"   />

              </div>
              <div class="form-group">
							 <svg  class="bi bi-envelope-open-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.941.435a2 2 0 00-1.882 0l-6 3.2A2 2 0 000 5.4v.125l8 4.889 8-4.889V5.4a2 2 0 00-1.059-1.765l-6-3.2zM16 6.697l-5.875 3.59L16 13.743V6.697zm-.168 8.108L9.246 10.93l-.089-.052-.896.548-.261.159-.26-.16-.897-.547-.09.052-6.585 3.874A2 2 0 002 16h12a2 2 0 001.832-1.195zM0 13.743l5.875-3.456L0 6.697v7.046z" clip-rule="evenodd"/>
</svg>				
							<label for="correo">
								Corréo Electrónico:
							</label>
							<input type="email" class="form-control" id="correo"  />
                        </div>
						<button type="button" id="enviar" class="btn btn-success">
							Siguiente
						</button>

						<fieldset>
										</form>
										<br>
                  
				</div>
				
			</div>
		</div>
	</div>
</div>

</div>

<script>

$('#enviar').click(function () {

	var Nombres = document.getElementById('nombres').value;
  var Apellidos = document.getElementById('apellidos').value;
  var Correo = document.getElementById('correo').value;


  var ruta = "nombres=" + Nombres + "&apellidos="+ Apellidos +
 "&correo="+Correo

  $.ajax({
    url: '../Procesos/RegDatosG.php',
    type: 'POST',
    data: ruta,
  })
    .done(function (res) {
      $('#respuesta').html(res)
    })
    .fail(function () {
      console.log("error");
    })
    .always(function () {
      console.log("complete");
    });
});

</script>
</body>
</html>
<?php };?>