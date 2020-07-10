<?php 
    include('../model/database.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM asignar_desarrollador_proyecto WHERE id_asignacion = $id";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("No fue posible eliminar");
        } else {
            header("Location: ../view/proyectos.php");
        }
    }
?>