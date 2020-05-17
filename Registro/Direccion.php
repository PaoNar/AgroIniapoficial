 <?php
session_start();
//error_reporting(0);  No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}else{ 

 include '../Conexion/conexion2.php';
$conexion=conexion();?>
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

<body>
<img src="../img/logo2.jpg" >
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4">

                <div class="modal-footer display-footer" id="respuesta"></div>
					<form role="form" >
              <legend class="text-center header">Registro de Datos</legend>
              <div class="form-group">
							<label for="provincia">
								Provincia:
                            </label>&nbsp;
                            <select class="selectpicker" id="provincia" name="provincia" require>
                                <option class="selectpicker" value="0">Seleccionar una Provincia</option>
                            <?php 
                             $sql="SELECT Id_Provincia,nombre FROM Agr_Provincia ORDER BY nombre";
                             $result=pg_query($conexion,$sql);
                                while($fila=pg_fetch_array($result)){
                                    echo '
                                    <option value="'.$fila['id_provincia'].'">'.$fila['nombre'].'</option>
                                    ';}
                            ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="canton">
								Canton:
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select id="canton" name="canton" require></select>
                            </div>
                            <div class="form-group">
                            <label for="parroquia">
								Parroquia:
                            </label> 
                            <select id="parroquia" name="parroquia" require></select>
                        </div>
                        <div class="form-group">
                             <span class="col-md-1 col-md-offset-2 text-center"> <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
</svg></span>
							<label for="Ddomicilio">
								Dirección Domiciliaria:
							</label>
                            <textarea class="form-control" id="direccion" rows="3" require></textarea>
                        </div>
                      
                       
						
						<button type="button" id="enviar" class="btn btn-success">
							siguiente
                        </button>
                    </form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
$("#provincia").change(function(){

    $("#provincia option:selected").each(function(){
        id_provincia = $(this).val();
        $.post("../Procesos/getProvincia.php", {id_provincia: id_provincia
        }, function(data){
            $("#canton").html(data);
        });
    });
})
});

$(document).ready(function(){
$("#canton").change(function(){

    $("#canton option:selected").each(function(){
        id_canton = $(this).val();
        $.post("../Procesos/getCanton.php", {id_canton: id_canton
        }, function(data){
            $("#parroquia").html(data);
        });
    });
})
});


$('#enviar').click(function () {

var Provincia = document.getElementById('provincia').value;
var Canton = document.getElementById('canton').value;
var Parroquia = document.getElementById('parroquia').value;
var Direccion = document.getElementById('direccion').value;

var ruta = "provincia=" + Provincia + "&canton="+ Canton + "&parroquia="+ Parroquia + "&direccion="+ Direccion;


$.ajax({
  url: '../Procesos/RegDireccion.php',
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
<?php };?>