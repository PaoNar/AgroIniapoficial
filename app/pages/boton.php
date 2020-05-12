<?php
session_start();
// error_reporting(0); // No mostrar los errores 
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo 'Solicitar Permiso';
die();
}

include_once '../../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

        $sql="SELECT nombres, apellidos, correo, ci, direccion, asociacion,  agr_provincia.nombre as provincia
       FROM Agr_usuario
       INNER JOIN agr_provincia ON agr_usuario.id_provincia = agr_provincia.id_provincia
       
          WHERE ci = '$usuario'";

       $nombres = $_POST['nombres'];
       $apellidos = $_POST['apellidos'];
       $correo = $_POST['correo'];
       $ci = $_POST['ci'];
       $direccion = $_POST['direccion'];
       $asociacion = $_POST['asociacion'];
        $provincia = $_POST['provincia'];
        $canton = $_POST['canton'];
        $parroquia = $_POST['parroquia'];
      

       
 
if ($nombres == null && $apellidos == null && $correo == null  && $ci == null && $direccion == null  && $asociacion == null  && $provincia == null  && $canton == null  && $parroquia == null  ){
    echo '<div class="alert alert-danger" role="alert">
    <strong>Por favor complete todos los campos!</strong></div>';
}else{
     $sql=" UPDATE Agr_usuario set nombres ='$nombres', apellidos ='$apellidos', correo= '$correo',
     ci ='$ci', direccion ='$direccion', asociacion= '$asociacion', provincia ='$provincia', canton ='$canton', parroquia= '$parroquia'
      where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
    $result=pg_query($conexion,$sql);

    echo ' <script> location.href="perfil.php";</script>';
}


?>