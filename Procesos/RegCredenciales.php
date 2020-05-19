
<?php
session_start();
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo 'Usted no tiene autorizacion';
die();
}else {
?>

<!doctype html>
<html class="no-js">
<head>
	<title>Registro de Usuario</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<!-- <link rel="stylesheet" href="css/strength.css">
	<script src="js/password_strength.js"></script>
    <script src="js/jquery-strength.js"></script> -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
<img src="../img/logo2.jpg" >
<div class="container-fluid">
	<div class="row">
      <div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4">

            <?php
            
            include_once '../Conexion/conexion2.php';
              $conexion=conexion();

              $asociacion = $_POST['asociacion'];
               $clave = md5($_POST['clave']);
               

               if($clave == null || $clave == '0'){
                  echo '<div class="alert alert-danger" role="alert">
                     Por favor ingrese una <strong>clave</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      </div>';
                  }else{
                        
                      $sql=" UPDATE Agr_usuario SET clave = '$clave', asociacion ='$asociacion', id_estado = (select Id_Estado from Agr_Estado where nombre_corto = 'R'), 
                       id_tipo_usuario = (select id_tipo_usuario from Agr_Tipo_Usuario where nombre = 'U')";
                      $result=pg_query($conexion,$sql);

                      echo '
                           <br><br>
                                          
                           <div class="col-md-12">
                              <h4  >
                              Excelente, se ha completado el registro con éxito!
                              </h4>
                              <p>
                                 <strong>Por favor vuelva a Ingresar !</strong>     
                              </p>
                           </div>';
                           session_destroy();                 
                  }
                  ?>
               </div>
         </div>
      </div>
   </body>
</html>
<?php
 };?>