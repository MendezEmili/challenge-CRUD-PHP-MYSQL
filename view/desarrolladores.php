<?php include('../database.php');
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
                                    <div class="col-10 col-md-10 mt-1">
                                        <button type="submit" class="btn btn-info" href="#" data-toggle="modal" data-target="#modalEditarProyecto"><img src="../assets/editar.png"></button>
                                    </div>
                                    <div class="col-10 col-md-10 mt-1">
                                        <button type="submit" class="btn btn-danger"><img src="../assets/eliminar.png"></button>
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