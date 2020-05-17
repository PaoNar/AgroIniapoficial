<?php
session_start();
include '../Conexion/conexion2.php';
$conexion=conexion();

$correo = $_SESSION['correo'];

if(trim($_POST["clave"]) != "")
{
 $password = strtolower(htmlentities($_POST["clave"], ENT_QUOTES));
 $clave=md5($password);
 
  if( !$clave ){
    echo 'error';
  
  }else{
    
   $sql = "UPDATE agr_usuario SET clave = '$clave'  WHERE correo ='$correo'";
   $result=pg_query($conexion,$sql);
   
   echo 'Contraseña Actualizada  <p>';
   session_destroy();
   header("Location: ../login2/login.php");
  }
 }else{
  echo 'Error Ingrese nueva clave';
 }
pg_close();
?>
