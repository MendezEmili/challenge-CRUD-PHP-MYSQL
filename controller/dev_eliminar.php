<?php 
    include('../model/database.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM desarrolladores WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("No fue posible eliminar");
        } else {
            header("Location: ../view/desarrolladores.php");
        }
    }
?>