<?php
    include("../model/database.php");


        if(isset($_POST['guardar'])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];
            $cliente = $_POST['cliente'];
    
            $query = "INSERT INTO proyectos(nombre, descripcion, imagen, cliente) VALUES ('$nombre', '$descripcion', '$imagen', '$cliente')";
    
            $resultado = mysqli_query($conexion, $query);
    
            if(!$resultado){
                die("Error al intentar guardar");
            } else {
                header("Location: ../view/proyectos.php");
            }
        }
?>