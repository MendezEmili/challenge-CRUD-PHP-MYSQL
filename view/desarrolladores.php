<?php include('../model/database.php');
include('./header.php'); ?>

<!--Container para formulario de desarrollador-->
<div class="container">
    
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="bg-dark text-white text-center py-3 rounded">
                <h5 class="">Ingresar nuevo desarrollador</h5>
            </div>
            <form action="../controller/dev_crear.php" method="POST" class="px-4 rounded text-white border bg-secondary">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre desarrollador">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Cargo</label>
                    <input type="text" class="form-control" name="cargo" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Correo electrónico</label>
                    <input type="text" class="form-control" name="email"  placeholder="ejemplo@gmail.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">URL portafolio</label>
                    <input type="text" class="form-control" name="url_portafolio" placeholder="www.portafolio.com">
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
                    <th scope="col">Cargo</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Portafolio</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT * FROM desarrolladores";
                    $resultado = mysqli_query($conexion, $query);

                    while($fila = mysqli_fetch_array($resultado)){?>
                        <tr>
                            <th><?php echo $fila['nombre'] ?></th>
                            <td><?php echo $fila['cargo'] ?></td>
                            <td><?php echo $fila['correo'] ?></td>
                            <td><?php echo $fila['url_portafolio'] ?></td>
                            <td>
                                <div class="row">
                                    <!--<div class="col-10 col-md-10 mt-1">
                                        <button type="submit" class="btn btn-info" href="#" data-toggle="modal" data-target="#modalModificarDesarrollador"><img src="../assets/editar.png"></button>
                                    </div>-->
                                    <div class="col-10 col-md-10 mt-1">
                                        <a href="../controller/dev_eliminar.php?id=<?php echo $fila['id']?>" class="btn btn-danger">
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
<!--Fin de container para formulairo de desarrollador-->

<?php
include('./footer.php');
?>
</html>


<!--Inicio modal para modificar desarrollador -->
<div class="modal fade" id="modalModificarDesarrollador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LongTitle">Asignar desarrollador a proyecto</h5>
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
                        <select class="form-control" name="id_desarrollador">
                            <?php 
                                $query = "SELECT * FROM desarrolladores";
                                $resultado = mysqli_query($conexion, $query);
            
                                while($fila = mysqli_fetch_array($resultado)){?>
                                <option><?php echo $fila['nombre'] ?></option>    
                                <?php } ?>                           
                        </select>
                    </div>     
                    <div class="form-group">
                        <label>Rol</label>
                        <input type="text" class="form-control" name="rol">
                    </div>              
                </form>                             
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="asignar">Asignar</button>      
            </div>                       
        </div>
    </div>
</div>
<!-- Fin modal para modificar desarrollador -->
