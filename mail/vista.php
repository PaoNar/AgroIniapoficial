<?php
session_start();
error_reporting(0); 

include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql="SELECT correo FROM Agr_usuario WHERE ci = '$usuario'";
       
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

<?php include '../navegacion/navegacion.php'; ?>
</head>
<style>
	img{
		width:50%;
		border: transparent;
		margin:1%;
	
	}
  .iniap {
    
    opacity: 0.8;
    height: 100%;
    width: 100%;
    position:absolute;
    
  }
</style>

<body>
<img class="iniap" src="../img/logo2.png" >
<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-md-4">
				</div>
					<div class="col-md-4">
					<!-- Default form login -->
						<form class="text-center border  p-5"  action="enlace.php" method="post">

								<h2>Ingrese su correo: </h2>
								<img src="../img/candado.png" >
								<!-- Email -->
								<input type="text"  class="form-control mb-2" name="correo"  placeholder="mail">

								<!-- Recuperar button -->
								<button class="btn btn-info btn-block my-4" type="submit">Enviar</button>
				
						</form>
						<!-- Default form login -->													

					</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>