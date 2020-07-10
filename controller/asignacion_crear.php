<?php
    include("../model/database.php");

            if(isset($_POST['guardar'])){
                $id_proyecto = $_POST['id_proyecto'];
                $cadena_desarrollador = explode(".", $_POST['id_desarrollador']);
                $id_desarrollador = $cadena_desarrollador[0];
                $rol = $_POST['rol'];
        
                $query = "INSERT INTO asignar_desarrollador_proyecto(id_proyecto, id_desarrollador, rol) VALUES ('$id_proyecto', '$id_desarrollador', '$rol')";
        
                $resultado = mysqli_query($conexion, $query);
        
                if(!$resultado){
                    die("Error al intentar guardar");
                } else {
                    header("Location: ../view/proyectos.php");
                }    
            }
?>