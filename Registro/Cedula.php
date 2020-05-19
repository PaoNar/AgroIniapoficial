
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <?php include '../navegacion/navegacion.php'; ?>


</head>

<style>
  img {
    
    opacity: 0.8;
    height: 100%;
    width: 100%;
    position:absolute;
    
  }

</style>

<body  >
<img src="../img/logo2.png" >
 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
					<form role="form">
            
              <div class="row ">
                <div class="form-group">
                  <h2 for="cedula">Registro de Datos</h2>
                </div>
              </div>
              <div class="row ">
                <div class="form-group">
                  <label for="cedula">Cédula de Identidad:</label>
                  <input type="text" class="form-control" id="cedula">
                </div>
              </div>
							
						<button type="button" id="enviar" class="btn btn-success ">
							Siguiente
						</button>
          </form><br>
          
          
          <div class="modal-footer display-footer" id="respuesta"></div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<script>

$('#enviar').click(function () {

  var Cedula = document.getElementById('cedula').value;

  var ruta = "cedula=" + Cedula;

  $.ajax({
    url: '../Procesos/CedulaVI.php',
    type: 'POST',
    data: ruta,
  })
    .done(function (res) {
      $('#respuesta').html(res)
    })
    .fail(function () {
      console.log("error");
    })
    .always(function () {
      console.log("complete");
    });
});

</script>
</div>
</body>
</html>
