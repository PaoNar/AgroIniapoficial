<?php
  session_start();
  $_SESSION['ci'] = $ci;
  
  // Elimina la variable email en sesión.
  unset($_SESSION['ci']); 

  // Elimina la sesion.
  session_destroy();
  
  // Redirecciona a la página de login.
  header("HTTP/1.1 302 Moved Temporarily"); 
  header("Location: ../Registro/index.php");
?>