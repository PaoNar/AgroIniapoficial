<?php
session_start();
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo 'Usted no tiene autorizacion';
die();
}else{
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$usuario = $_SESSION['usuario'];



if ($nombres == null || $nombres == '') {
    echo '<div class="alert alert-danger" role="alert">
    <strong>Importante! </strong> Por favor ingrese sus <strong>Nombres </strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }else{
    
               
      if($apellidos == null || $apellidos == ''){
           echo '<div class="alert alert-danger" role="alert">
               Por favor ingrese su <strong>Apellidos</strong>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              </div>';
              }else{
              if($correo == null || $correo == ''){
                  echo '<div class="alert alert-danger" role="alert">
                     Por favor ingrese su <strong>correo</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      </div>';
                            }else{
                        
                                $sql=" update Agr_usuario set nombres='$nombres',  apellidos='$apellidos', correo= '$correo'  where ci= '$usuario'";
                                  $result=pg_query($conexion,$sql);

                            
                                  echo '<script> location.href="../registro/Direccion.php";</script>';
                            }
                
               }
  }

};
?>