<?php
session_start();
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];


if ($nombres == null){
    echo '<div class="alert alert-danger" role="alert">
    <strong>Por favor complete todos los campos!</strong></div>';
}else{

     $sql=" update Agr_usuario set nombres ='$nombres'
      where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
    $result=pg_query($conexion,$sql);

    
}


if($apellidos == null){
        echo '<div class="alert alert-danger" role="alert">
        <strong>Por favor complete este campo!</strong></div>';
    }else{
        $sql=" update Agr_usuario set apellidos ='$apellidos'
      where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
    $result=pg_query($conexion,$sql);
    

    };

if($correo == null){
        echo '<div class="alert alert-danger" role="alert">
        <strong>Por favor complete este campo!</strong></div>';
    }else{
        $sql=" update Agr_usuario set correo= '$correo' 
      where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
    $result=pg_query($conexion,$sql);

     echo ' <script> location.href="../registro/Direccion.php";</script>';
 };
    



?>