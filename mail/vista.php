<?php
session_start();
error_reporting(0); 

include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql="SELECT correo FROM Agr_usuario WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql);
       $fila=pg_fetch_array($last);

     
       $correo = $fila['correo'];
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

	
</head>
<body>

<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
				<!-- Default form login -->
					<form class="text-center border border-light p-5"  action="validar.php" method="post">

							<strong><h2 class="h4 mb-4">Recuperacion de Contraseña</h2></strong>

							<p class="h4 mb-4">Porfavor ingrese su correo electronico: </p>

							<!-- Email -->
							<input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="correo" placeholder="mail">

              <!-- Recuperar button -->
							<button class="btn btn-info btn-block my-4" type="submit">Enviar</button>
			

					</form>
					<!-- Default form login -->
													

	</div>
				<div class="col-md-4">
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>