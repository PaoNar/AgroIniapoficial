<?php
session_start();
include '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql="SELECT correo FROM Agr_usuario   WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql);
       $fila=pg_fetch_array($last);

if(trim($_POST["correo"]) != "")
{

 $password = strtolower(htmlentities($_POST["correo"], ENT_QUOTES));
 $result = pg_query('SELECT correo FROM agr_usuario WHERE correo=\''.$password.'\'');
 if($row = pg_fetch_array($result)){
  if($row["correo"] == $password){
   
   echo 'Se ha enviado su codigo de verificacion   <p>';
      echo '<script> location.href="enlace.php"; </script>';
 
  }else{
   echo 'mail incorrecto';
  }
 }else{
  echo 'Usuario no existente en la base de datos';
 }
 pg_free_result($result);
}else{
 echo 'Debe especificar un mail';
}
pg_close();
?>