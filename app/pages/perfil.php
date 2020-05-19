
<?php
session_start();
error_reporting(0); // No mostrar los errores 
include_once  '../../Conexion/conexion2.php';
$conexion=conexion();
$validar = $_SESSION['usuario'];

if($validar == null || $validar = ''){
echo 'Solicitar Permiso';
die();
}





$usuario = $_SESSION['usuario'];

        $sql="SELECT nombres, apellidos, correo, ci, direccion, agr_usuario.asociacion, agr_provincia.nombre as provincia, agr_caton.nombre as canton, agr_parroquia.nombre as parroquia
       FROM Agr_usuario 
       INNER JOIN agr_provincia ON agr_usuario.id_provincia = agr_provincia.id_provincia
       INNER JOIN agr_caton ON agr_usuario.id_canton = agr_caton.id_canton
       INNER JOIN agr_parroquia ON agr_usuario.id_parroquia = agr_parroquia.id_parroquia  WHERE ci = '$usuario'";

       $last=pg_query($conexion,$sql);
       $row=pg_fetch_array($last);

       $nombres = $row['nombres'];
       $apellidos = $row['apellidos'];
       $correo = $row['correo'];
        $ci=$row['ci'];
        $direccion=$row['direccion'];
        $asociacion=$row['asociacion'];
        $provincia=$row['provincia'];
         $canton=$row['canton'];
          $parroquia=$row['parroquia'];
?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>INIAP</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />


    </head>
    
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                INIAP
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                               
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                                   
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../login2/salir.php" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="perfil.php">
                                <i class="fa fa-dashboard"></i> <span>Perfil</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="../../leaflet-CRUD-master/">
                                <i class="fa fa-th"></i> <span>MAPA</span> 
                            </a>
                        </li>
                        
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>



            

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                

                <!-- Main content -->
                <section class="content">
                    <div class="row ">
                        <!-- left column -->
                        <div class="col-md-6 align-items-center">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header ">
                                    <h3 class="box-title">Perfil del Usuario</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->


                                <form role="form" action="editar.php" method="post">
                                    <div class="box-body  ">
                                        <div class=" col-lg-6 align-items-center">
                                            <div class="input-group ">
                                                <label>Nombres</label>
                                                <input type="text" class="form-control" name="nombres"  value="<?php echo $nombres; ?>"  readonly >
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        <div class="col-lg-6 align-items-center">
                                            <div class="input-group">
                                                <label>Apellidos</label> 
                                                <input type="text" class="form-control" name="apellidos"  value="<?php echo $apellidos; ?>"  readonly >
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->

                                        <div class="col-lg-6 align-items-center">
                                            <div class="input-group">
                                                <label>CI</label> 
                                                <input type="text" class="form-control"  name="ci"  value="<?php echo $ci; ?>"  readonly  >
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        <div class="col-lg-6 align-items-center">
                                            <div class="input-group">
                                                <label>Asociacion</label> 
                                                <input type="text" class="form-control" name="asociacion"  size='2'  value="<?php echo $asociacion; ?>" readonly >
                                            </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        <div class="box-body">
                                            <div class="form-group">
                                            <label>Correo</label>
                                            <input type="text" class="form-control" name="correo"   value="<?php echo $correo; ?>" readonly/>
                                        
                                        </div><!-- /.col-lg-6 -->
                                    </div><!-- /.row -->
                                    
                                    <div class="box-body">
                                            <div class="form-group">
                                            <label>Direccion</label>
                                            <input type="text" class="form-control"  name="direccion"   value="<?php echo $direccion; ?>" readonly/>
                                            
                                            <div class="box-body">
                                                <label for="provincia">
                                                    Provincia:
                                                </label>&nbsp;
                                                <select  id="provincia" readonly >
                                                    <option value="<?php echo $id_provincia; ?> "> <?php echo $provincia; ?>  </option>
                                                    <?php 
                                                    $sql="SELECT Id_Provincia,nombre FROM Agr_Provincia ORDER BY nombre";
                                                    $result=pg_query($conexion,$sql);
                                                        while($row=pg_fetch_array($result)){
                                                            echo '<option value="'.$row['id_provincia'].'">'.$row['nombre'].'</option>
                                                            ';} ?>
                                                </select>
                                            </div>
                                            <div class="box-body">
                                                <label for="canton" readonly>
                                                 Canton:
                                                </label>
                                                <select id="canton" name="canton" >
                                                     <option   value="<?php echo $id_canton; ?>"> <?php echo $canton; ?> </option>
                                                    
                                                </select>
                                            </div>
                                            <div class="box-body">
                                                <label for="parroquia">
                                                Parroquia:
                                                </label> 
                                                <select readonly id="parroquia" name="canton" >
                                                    <option   value="<?php echo $id_parroquia; ?>"> <?php echo $parroquia; ?> </option>
                                                </select>
                                            </div>  

                                    </div><!-- /.col-lg-6 -->

                                    <div class="box-footer">
                                        <button type="submit" href="editar.php" class="btn btn-primary">Editar</button>
                                    </div>
                  
                                </form>
                                
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

            
        </div><!-- ./wrapper -->

       


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

    </body>
</html>