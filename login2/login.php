


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

	
</head>
<style>
  img {
    
    opacity: 0.8;
    height: 100%;
    width: 60%;
    position:absolute;
		left: 36%;
    
  }
</style>

<body>
<img src="../img/logo3.jpg" >
<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-6">
			
			<div class="row">
				
				<div class="col-md-2">
				</div>
				<div class="col-md-6">
			
				<br><br>
					<form class="text-center border border-light p-2"  action="validacion.php" method="post">

							<h2 class="h4 mb-4 ">INGRESAR</h2>

							<!-- cedula -->
							<input type="text"  class="form-control mb-4" name="ci" placeholder="Cédula" autocomplete="off">

							<!-- clave -->
							<input type="password"  class="form-control mb-4" name="clave" placeholder="Clave">

							<!-- Sign in button -->
							<button class="btn btn-info btn-block my-4"  type="submit" > <a href="../app/menu.php"></a> Ingresar</button>

							<a href="../mail/vista.php">Olvidó su contraseña?</a>

							<!-- Register -->
							<p>No esta registrado?
									<a href="../Registro/Cedula.php">Registrarse</a>
							</p>

						
					</form>
					
					</div>
				
				
			</div>
		</div>
	</div>
</div>
</body>
</html>