<?php
session_start();


// // Iniciar la sesión
//      session_start();
//     // Variables de sesión:
//      header("Location: ../app/perfil.php");

//AQUI CONECTAMOS A LA BASE DE DATOS DE POSTGRES
include '../Conexion/conexion2.php';
$conexion=conexion();


if(trim($_POST["ci"]) != "" && $_POST["clave"] != "")
{
 // Puedes utilizar la funcion para eliminar algun caracter en especifico
 //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
 //$password = $HTTP_POST_VARS["password"];
 // o puedes convertir los a su entidad HTML aplicable con htmlentities
 $usuario = strtolower(htmlentities($_POST["ci"], ENT_QUOTES));

 $password = strtolower(htmlentities ($_POST["clave"], ENT_QUOTES));
 $passwordencrip = md5($password);

 $sql ="SELECT clave, ci FROM agr_usuario WHERE ci='$usuario'";
 $result=pg_query($conexion,$sql);
 if($fila=pg_fetch_array($result)){
  if($fila["clave"] == $passwordencrip){
   
  $_SESSION['usuario'] = $usuario;
   header("Location: ../app/pages/perfil.php");

     
   //Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
   /*Ingreso exitoso, ahora sera dirigido a la pagina principal.*/
  
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