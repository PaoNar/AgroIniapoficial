<?php
session_start();
// error_reporting(0); 
$validar= $_SESSION['correo'];

if($validar == null || $validar= ''){
echo 'El formulario ha caducado';
die();
}else {
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	
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
				<!-- Default form login -->
				
					<form class="text-center border border-light p-5" action="validarcontra.php"  method="POST" >

							<strong><h2 class="h4 mb-4">Recuperación de Contraseña</h2></strong>
						
							<input type="password"  class="form-control mb-4"   name="clave2" minlength="5" required placeholder=" Nueva Contraseña">

							<input type="password"  class="form-control mb-4"    name="clave" minlength="5" required placeholder=" Repetir Contraseña">

              <!-- Recuperar button -->
							<button type="submit" class="btn btn-info btn-block my-4" >Enviar</button>
			

					</form>
					
				</div>
				
			</div>
		</div>
	</div>
</div>

</body>
</html>

<?php };?>