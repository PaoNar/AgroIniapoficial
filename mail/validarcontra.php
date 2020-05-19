
<?php

session_start();
error_reporting(0); // No mostrar los errores 
$validar = $_SESSION['correo'];

if($validar == null || $validar = ''){
echo 'El formulario ha caducado';
die();
}else{

include_once '../Conexion/conexion2.php';
$conexion=conexion();

 if($_POST['clave']== null || $_POST['clave']== ''){

    echo '
    <strong>Por favor ingrese la nueva clave</strong>';

 }else{

    if($_POST['clave2']== null || $_POST['clave2']== ''){

        echo ' Profavor confirme su nueva clave</strong>';

    }else{


if($_POST['clave'] == $_POST['clave2']){

    $correo = $_SESSION['correo'];
    
    $clave = md5($_POST['clave']);

    $sql=" UPDATE Agr_usuario SET clave = '$clave' WHERE correo= '$correo'";
    $result=pg_query($conexion,$sql);

    session_destroy();
    header("Location: ../login2/login.php");
    



}else{
    echo ' </strong> Las Claves no coinciden</strong>';
}
}
}
};
?>


