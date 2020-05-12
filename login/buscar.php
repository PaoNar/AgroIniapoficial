<?php
session_start();
  include_once '../Conexion/conexion.php';
  include_once 'RegLogin.php';

    $cedula =$_POST['cedula'];
    $clave = $_POST['clave'];

    if(isset($cedula)){
        $buscar = new DataBase();
        $mensaje = $buscar->buscarUsuario($cedula,$clave);
        if($mensaje){
              header("Location: cerrar-sesion.php"); 
            
        }else{
             
             header("Location: ../Registro/Cedula.html"); 
            
        }
        //echo $mensaje;
        //echo"<div><br><a href= '../Paginas/pagina1.html'>Regresar</a></div>";
    }
?>