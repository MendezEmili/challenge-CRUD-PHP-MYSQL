<?php
    include("../database.php");

            if(isset($_POST['guardar'])){
                $nombre = $_POST['nombre'];
                $cargo = $_POST['cargo'];
                $email = $_POST['email'];
                $url_portafolio = $_POST['url_portafolio'];
        
                $query = "INSERT INTO desarrolladores(nombre, cargo, correo, url_portafolio) VALUES ('$nombre', '$cargo', '$email', '$url_portafolio')";
        
                $resultado = mysqli_query($conexion, $query);
        
                if(!$resultado){
                    die("Error al intentar guardar");
                } else {
                    header("Location: ../view/desarrolladores.php");
                }    
            }
?>