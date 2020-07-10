<?php
    include("../model/database.php");
    session_start();

            if(isset($_POST['guardar'])){
                $nombre = $_POST['nombre'];
                $cargo = $_POST['cargo'];
                $email = $_POST['email'];
                $url_portafolio = $_POST['url_portafolio'];
                
                $query = "SELECT * FROM desarrolladores WHERE correo = '$email'";
                $consulta = mysqli_query($conexion, $query);
                
                if(mysqli_num_rows($consulta)==0){

                    $query = "INSERT INTO desarrolladores(nombre, cargo, correo, url_portafolio) VALUES ('$nombre', '$cargo', '$email', '$url_portafolio')";
        
                    $resultado = mysqli_query($conexion, $query);
            
                    if(!$resultado){
                        die("Error al intentar guardar");
                    } else {
                        header("Location: ../view/desarrolladores.php");
                    }   
                } else {
                    $_SESSION['message'] = "Correo ya ingresado";
                    header("Location: ../view/desarrolladores.php");
                }
         
            }
?>