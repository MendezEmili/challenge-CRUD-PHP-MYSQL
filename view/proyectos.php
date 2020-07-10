<?php 
include('../model/database.php');
include('./header.php');
?>

<!--Incio de contenedor para Proyectos-->
<div class="container">
    
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="bg-dark text-white text-center py-3 rounded">
                <h5 class="">Ingresar nuevo Proyecto</h5>
            </div>
            <form action="../controller/proyecto_crear.php" method="POST" class="px-4 rounded text-white border bg-secondary">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del proyecto" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput">Descripción</label>
                    <textarea name="descripcion" class="form-control" placeholder="Descripción de proyecto" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Imagen</label>
                    <input type="text" class="form-control" name="imagen" placeholder="url de imagen">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Cliente</label>
                    <input type="text" class="form-control" name="cliente" placeholder="nombre de cliente" required>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Asignar</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT * FROM proyectos";
                    $resultado = mysqli_query($conexion, $query);

                    while($fila = mysqli_fetch_array($resultado)){?>
                        <tr>
                            <th><?php echo $fila['nombre'] ?></th>
                            <td><?php echo $fila['descripcion'] ?></td>
                            <td><?php echo $fila['cliente'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-10 col-md-6">
                                        <a class="btn btn-warning" href="asignaciones.php?id=<?php echo $fila['id_proyecto']?>"><img src="../assets/asignar.png"></a>
                                    </div>
                                    <!--<div class="col-10 col-md-4">
                                        <button type="submit" class="btn btn-info" href="#" data-toggle="modal" data-target="#modalEditarProyecto"><img src="../assets/editar.png"></button>
                                    </div>-->
                                    <div class="col-10 col-md-6">
                                        <a href="../controller/proyecto_eliminar.php?id=<?php echo $fila['id_proyecto']?>" class="btn btn-danger">
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
<!--Fin de container para de Proyectos-->



<?php 
include('./footer.php');
?>


<!--Inicio modal para modificar un proyecto -->
<div class="modal fade" id="modalEditarProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LongTitle">Actualizar datos de alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form #formularioActualizacion = "ngForm">
                    <div class="form-group">
                        <label><strong>ID proyecto</strong></label>
                        <div>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><strong>Nombre proyecto</strong></label>
                        <div>
                          <label></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Desarrollador</label>
                        <input type="text" class="form-control" name="id_desarrollador">
                    </div>     
                    <div class="form-group">
                        <label>Rol</label>
                        <input type="text" class="form-control" name="rol">
                    </div>              
                </form>                             
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Asignar</button>      
            </div>                       
        </div>
    </div>
</div>
<!-- Fin modal para modificar un proyecto -->