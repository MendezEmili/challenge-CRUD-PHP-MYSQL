<?php 
    include('header.php');
    include('../model/database.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM proyectos WHERE id_proyecto = $id";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("No fue posible eliminar");
        } else {
            $filas = mysqli_fetch_array($resultado);
            $nombre =$filas['nombre'];
        }
    }
?>
<div class="container">
    <div class="row">
    <div class="col-12 col-lg-4">
        <div class="bg-dark text-white text-center py-3 rounded">
                <h5 class="">Asignar nuevo desarrollador</h5>
        </div>
        <form action="../controller/asignacion_crear.php" method="POST" class="px-4 rounded text-white border bg-secondary">
            <div class="form-group">
                <label><strong>ID proyecto</strong></label>
                <div>
                    <input type="number" class="form-control" name="id_proyecto" value="<?php echo $id;?>">
                </div>
            </div>
            <div class="form-group">
                <label><strong>Nombre proyecto</strong></label>
                <div>
                <input type="text" class="form-control" placeholder="Rol del desarrollador en el proyecto" value="<?php echo $nombre;?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label>Desarrollador</label>
                <select class="form-control" name="id_desarrollador">
                    <?php 
                        $query = "SELECT * FROM desarrolladores";
                        $resultado = mysqli_query($conexion, $query);
            
                        while($fila = mysqli_fetch_array($resultado)){?>
                        <option><?php echo $fila['id'].". ".$fila['nombre'] ?></option>    
                    <?php } ?>                           
                </select>
            </div>     
            <div class="form-group">
                <label>Rol</label>
                <input type="text" class="form-control" name="rol" placeholder="Rol del desarrollador en el proyecto" required>
            </div>  
            <div class="pb-2">
                    <input type="submit" class="btn btn-primary btn-block" name="guardar" value="Guardar">
                </div>            
        </form>    
    </div>      
    <div class="col-12 col-lg-8">
    <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Proyecto</th>
                    <th scope="col">Desarrollador</th>
                    <th scope="col">Rol</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT ADP.id_asignacion, ADP.rol, P.nombre AS proyecto, D.nombre
                    FROM asignar_desarrollador_proyecto ADP 
                    INNER JOIN proyectos P ON P.id_proyecto = ADP.id_proyecto
                    INNER JOIN desarrolladores D ON D.id = ADP.id_desarrollador
                    WHERE P.id_proyecto = $id";

                    $resultado = mysqli_query($conexion, $query);

                    while($fila = mysqli_fetch_array($resultado)){?>
                        <tr>
                            <th><?php echo $fila['id_asignacion'] ?></th>                           
                            <td><?php echo $fila['proyecto'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['rol'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-10 col-md-10 mt-1">
                                        <a href="../controller/asignacion_eliminar.php?id=<?php echo $fila['id_asignacion']?>" class="btn btn-danger">
                                            <img src="../assets/eliminar.png">
                                        </a>
                                    </div>             
                                </div>
                            </td>
                        </tr>
                   <?php } ?>

                </tbody>
            </table>
    </div>
</div>
</div>

<?php 
    include('footer.php');
?>                
 