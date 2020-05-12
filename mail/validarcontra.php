<?php
session_start();
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];


if(trim($_POST["clave"]) != "")
{
 // Puedes utilizar la funcion para eliminar algun caracter en especifico
 //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
 //$password = $HTTP_POST_VARS["password"];
 // o puedes convertir los a su entidad HTML aplicable con htmlentities

 $password = strtolower(htmlentities($_POST["clave"], ENT_QUOTES));
 $clave=md5($password);
 
  if( !$clave ){
    echo 'error';
  
      // echo '<script> location.href="enlace.php"; </script>';
  
   //Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
   /*Ingreso exitoso, ahora sera dirigido a la pagina principal.
   <SCRIPT LANGUAGE="javascript">
   location.href = "index.php";
   </SCRIPT>*/
  }else{
   $_SESSION['usuario'] = $usuario;
      
   $sql = "UPDATE agr_usuario SET clave = '$clave'  WHERE ci ='$usuario'";
   $result=pg_query($conexion,$sql);
   
   echo 'Contraseña Actualizada  <p>';
   header("Location: ../app/pages/perfil.php");
   
  }
 }else{
  echo 'Ingrese nueva clave';
 }


pg_close();
?>