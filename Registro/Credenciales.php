<?php
session_start();
error_reporting(0); // No mostrar los errores 
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo 'NO tiene permiso, se termino el registro';
die();
}else {

?>

<!doctype html>
<html class="no-js">
<head>
	<title>Registro de Usuario</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	
	<!-- <script src="js/password_strength.js"></script> -->
    <!-- <script src="js/jquery-strength.js"></script> -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <style>

    .volver{
        color:white;
        width:25%;
        height:50%;
        margin-left:10%;
        margin-right:20%;
        background-color: #2E64FE;
        border-radius:15%;
    }
    img {
    
    opacity: 0.8;
    height: 100%;
    width: 100%;
    position:absolute;
    
  }
</style>
 <?php include '../navegacion/navegacion.php'; ?>
</head>

<body>
<img src="../img/logo2.jpg" >
<div class="container-fluid">
	
	<div class="row">
		
		<div class="col-md-12">
			
			<div class="row">
				
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
                    <form action="../Procesos/RegCredenciales.php" method="post" role="form">
                    	
                            <legend class="text-center header"> Registro de Datos </legend>
                    
                           <div class="form-group">
                            <label for="asociacion">
								Pertenece a una asociación? :
                            </label>
                            <select  id="asociacion" name="asociacion" require>
                            <option value="no">Seleccione una respuesta: </option>
                            <option value="no">No</option>
                            <option value="si">Si</option></select>
                            </div>
                           
                           <div class="form-group">
							<label for="clave">
								Contraseña:
							</label>
							<input type="password" class="check-seguridad form-control" name="clave" minlength="5" required/>
                            </div>
                        
						<button type="submit" class="btn btn-success">
							Enviar Registro
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
$(document).ready(function(){
$("#asociacion").change(function(){
    $("#asociacion option:selected").each(function(){
        id = $(this).val();
        $.post("../Procesos/getAssocia.php", {id: id
        }, function(data){
            $("#Easociacion").html(data);
        });
    });
})
});
</script>
    
</body>
</html>
<?php }; ?>