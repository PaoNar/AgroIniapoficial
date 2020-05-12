<?php
session_start();
?>
<?php
echo 'Bienvenido, ';
if (isset($_SESSION['nombres'])) {
 echo '<b>'.$_SESSION['nombres'].'</b>.';
 echo '<p><a href="../leaflet-CRUD-master">salir</a></p>';
}else{
 echo '<p><a href="../leaflet-CRUD-master">salir</a></p>';
 
}
?>