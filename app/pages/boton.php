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

        $sql="SELECT nombres, apellidos, correo, ci, direccion, asociacion, agr_provincia.id_provincia as id_provincia, agr_provincia.nombre as provincia , agr_caton.id_canton as id_canton, agr_caton.nombre as canton, agr_parroquia.id_parroquia as id_parroquia ,agr_parroquia.nombre as parroquia
       FROM Agr_usuario 
        INNER JOIN agr_provincia ON agr_usuario.id_provincia = agr_provincia.id_provincia  
        INNER JOIN agr_caton ON agr_usuario.id_canton = agr_caton.id_canton
        INNER JOIN agr_parroquia ON agr_usuario.id_parroquia = agr_parroquia.id_parroquia WHERE ci = '$usuario'";

       $last=pg_query($conexion,$sql);
       $row=pg_fetch_array($last);

       $nombres = $row['nombres'];
       $apellidos = $row['apellidos'];
       $correo = $row['correo'];
        $ci=$row['ci'];
        $direccion=$row['direccion'];
        $asociacion=$row['asociacion'];
        $id_provincia=$row['id_provincia'];
        $provincia=$row['provincia'];
        $id_canton=$row['id_canton'];
        $canton=$row['canton'];
        $id_parroquia=$row['id_parroquia'];
        $parroquia=$row['parroquia'];
      

       
 
if ($nombres == null && $apellidos == null && $correo == null  && $ci == null && $direccion == null  && $asociacion == null  && $id_provincia == null  && $id_canton == null  && $id_parroquia == null  ){
    echo '<div class="alert alert-danger" role="alert">
    <strong>Por favor complete todos los campos!</strong></div>';
}else{
    $nombres = $_POST['nombres'];
       $apellidos = $_POST['apellidos'];
       $correo = $_POST['correo'];
        $ci=$_POST['ci'];
        $direccion=$_POST['direccion'];
        $asociacion=$_POST['asociacion'];

    $id_provincia = $_POST['id_provincia'];
    $id_canton = $_POST['id_canton'];
    $id_parroquia = $_POST['id_parroquia'];

     $sql=" UPDATE Agr_usuario set nombres ='$nombres', apellidos ='$apellidos', correo= '$correo',
     ci ='$ci', direccion ='$direccion', asociacion= '$asociacion', id_provincia =$id_provincia, id_canton = $id_canton, id_parroquia= $id_parroquia
      where CI= '$usuario'";
        $result=pg_query($conexion,$sql);

    echo ' <script> location.href="perfil.php";</script>';
}


?>