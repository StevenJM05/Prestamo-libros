<?php
$prestamosController = new PrestamosController();   
if(isset($_POST['del'])){

    if(isset($_POST['elementos']) && is_array($_POST['elementos'])) {
        foreach($_POST['elementos'] as $idprestamos) {
            $prestamosController->delete(intval($idprestamos)); 
            
        }
    }
}

if(isset($_POST["finalizado"])){
    if(isset($_POST['elementos']) && is_array($_POST['elementos'])) {
        foreach($_POST['elementos'] as $idprestamos) {
            $prestamosController->finalizar(intval($idprestamos)); 
            
        }
    }
}

?>
<div class="container mt-2 text-center bg-dark text-white">
    <h1>Prestamos</h1>
</div>

<div class="container mt-3">
<h1>Acciones:</h1>
<hr>
<ul class="nav nav-pills" style="font-size: 18px;">
  <li class="nav-item">
    <a class="nav-link mx-2" aria-current="page" href="addprestamo" style="background-color: #3F51B5; color: white;">Agregar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link mx-2" href="pres_alumnos" style="background-color: #3F51B5; color: white;">Prestamos de Alumno</a>
  </li>
  <li class="nav-item">
    <a class="nav-link mx-2" href="pres_fecha" style="background-color: #3F51B5; color: white;">Fecha</a>
  </li>
  <li class="nav-item">
    <a class="nav-link mx-2" href="estado" style="background-color: #3F51B5; color: white;">Estado de prestamos</a>
  </li>
</ul>

</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header" style="background-color: #3F51B5; color: white;">
            <h5 class="card-title mb-0">Lista de Préstamos</h5>
        </div>
        
        <div class="card-body">
            <form method="post">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead style="background-color: #E91E63; color: white;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Préstamos</th>
                                <th scope="col">Nombre Alumno</th>
                                <th scope="col">Nombre Libro</th>
                                <th scope="col">Fecha de Préstamo</th>
                                <th scope="col">Fecha de Devolución</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prestamosController->listar() as $prestamo) { ?>
                                <tr>
                                    <td><input type="checkbox" name="elementos[]" value="<?php echo $prestamo->getIdPrestamos(); ?>" title=" "></td>
                                    <td><?php echo $prestamo->getIdPrestamos(); ?></td>
                                    <td><?php echo $prestamo->getIdAlumno(); ?></td>
                                    <td><?php echo $prestamo->getIdLibros(); ?></td>
                                    <td><?php echo $prestamo->getFechaPrestamo(); ?></td>
                                    <td><?php echo $prestamo->getFechaDevolucion(); ?></td>
                                    <td><?php echo ($prestamo->getEstado() == 1 ? 'Activo' : 'Finalizado'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-auto">
                        <button class="btn btn-danger" type="submit" name="del" style="background-color: #F44336;">Eliminar</button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-warning" type="submit" name="finalizado" style="background-color: #FFC107;">Finalizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



