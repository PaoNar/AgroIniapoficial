<?php

include_once '../Conexion/conexion.php';
    class DataBase{
         
        public function buscarUsuario($cedula,$clave){
            $array = null;
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql = "select * from Agr_usuario where cedula=:cedula and clave=:clave";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(':cedula',$cedula);
            $statement->bindParam(':clave',$clave);
            $statement->execute();
            while($resultado = $statement->fetch()){
                $array[] =$resultado;
                
            }
            return $array;
        }    
    }
?>



