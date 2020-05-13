<?php
session_start();
include '../Conexion/conexion2.php';
$conexion=conexion();



$usuario = $_SESSION['usuario'];

function quitar($mensaje)
{
 $nopermitidos = array("'",'\\','<','>',"\"");
 $mensaje = str_replace($nopermitidos, "", $mensaje);
 return $mensaje;
}
if(trim($_POST["correo"]) != "")
{
 // Puedes utilizar la funcion para eliminar algun caracter en especifico
 //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
 //$password = $HTTP_POST_VARS["password"];
 // o puedes convertir los a su entidad HTML aplicable con htmlentities

 $password = strtolower(htmlentities($_POST["correo"], ENT_QUOTES));
 $result = pg_query('SELECT correo FROM agr_usuario WHERE correo=\''.$password.'\'');
 if($row = pg_fetch_array($result)){
  if($row["correo"] == $password){
   
   echo 'Se ha enviado su codigo de verificacion   <p>';
      echo '<script> location.href="enlace.php"; </script>';
      
  
   //Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
   /*Ingreso exitoso, ahora sera dirigido a la pagina principal.
   <SCRIPT LANGUAGE="javascript">
   location.href = "index.php";
   </SCRIPT>*/
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