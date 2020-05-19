<?php
session_start();


//AQUI CONECTAMOS A LA BASE DE DATOS DE POSTGRES
include '../Conexion/conexion2.php';
$conexion=conexion();


if(trim($_POST["ci"]) != "" && $_POST["clave"] != "")
{

 $usuario = strtolower(htmlentities($_POST["ci"], ENT_QUOTES));

 $password = strtolower(htmlentities ($_POST["clave"], ENT_QUOTES));
 $passwordencrip = md5($password);

 $sql ="SELECT clave, ci FROM agr_usuario WHERE ci='$usuario'";
 $result=pg_query($conexion,$sql);
 if($fila=pg_fetch_array($result)){
  if($fila["clave"] == $passwordencrip){
   
  $_SESSION['usuario'] = $usuario;
   header("Location: ../app/pages/perfil.php");

  
  }else{
    
   echo 'Password incorrecto';
  }
 }else{
  echo 'Usuario no existente en la base de datos';
 }
 pg_free_result($result);
}else{
 echo 'Debe especificar un usuario y password';
}
pg_close();
?>