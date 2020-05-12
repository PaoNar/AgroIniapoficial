

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .entrar{
      margin-left: 20%;
    }

</style>
  <?php include 'menu.php'; 
        include_once '../Conexion/conexion2.php';
  ?>
</head>
<body>
  <h2 class="entrar" >Bienvenid@ : <?php echo $_SESSION['nombres']  ?>
  </h2>
</body>
</html>
