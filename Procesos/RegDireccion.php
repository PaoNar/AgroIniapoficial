<?php
session_start();
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo 'no tiene permiso';
die();
}else{
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$provincia = $_POST['provincia'];
$canton = $_POST['canton'];
$parroquia = $_POST['parroquia'];
$direccion = $_POST['direccion'];
$usuario = $_SESSION['usuario'];


if ($provincia == null || $provincia == '0'){

  echo '<div class="alert alert-danger" role="alert">
  <strong>Importante! </strong> Por favor seleccione la <strong>Provincia</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';

}else{
 
  if ($canton == null || $canton == '0'){

    echo '<div class="alert alert-danger" role="alert">
    <strong>Importante! </strong> Por favor seleccione el <strong>Canton</strong>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';

  }else {

    if ($parroquia == null || $parroquia == '0'){

      echo '<div class="alert alert-danger" role="alert">
      <strong>Importante! </strong> Por favor seleccione la <strong>Parroquia</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';

  }else{

    if ($direccion == null || $direccion == ''){

      echo '<div class="alert alert-danger" role="alert">
      <strong>Importante! </strong> Por favor especifique su <strong>Direccion domiciliaria</strong>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';

  }else{
    $sql=" UPDATE Agr_usuario SET id_provincia ='$provincia', id_canton ='$canton', id_parroquia= '$parroquia', direccion = '$direccion'  
    WHERE ci= '$usuario'";
  $result=pg_query($conexion,$sql);

  echo ' <script> location.href="../Registro/Credenciales.php";</script>';

  }

}
}
}
};
?>