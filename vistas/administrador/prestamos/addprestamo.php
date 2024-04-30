<?php

$alumnos_controller  = new alumnos_controller();
$LibrosController=new LibrosController();
$prestamosController = new PrestamosController();   
if (isset($_POST['ok1'])) {

    $id_alumno = $_POST['id_alumno'];
    $id_libros = $_POST['id_libros'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $estado = $_POST['estado'];


    $prestamo = new Prestamos();
    $prestamo->setIdAlumno($id_alumno);
    $prestamo->setIdLibros($id_libros);
    $prestamo->setFechaPrestamo($fecha_prestamo);
    $prestamo->setFechaDevolucion($fecha_devolucion);
    $prestamo->setEstado($estado);
    

    $prestamosController->agregar($prestamo);
}
?>

            <form method="post">
            <div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Agregar Nuevo Préstamo</h5>
        </div>
        <div class="card-body">
            <form method="post">
            <div class="mb-3 row" style="display: flex; align-items: center;">
            <label for="id_alumno" class="col-sm-4 col-form-label">Selecciona un Alumno:</label>
             <div class="col-sm-8">
            <select class="form-select" id="id_alumno" name="id_alumno">
            <?php foreach($alumnos_controller->listar2() as $alumno): ?>
            <option value="<?php echo $alumno->getIdAlumno(); ?>"><?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?></option>
            <?php endforeach; ?>
         </select>
      </div>
       </div>

         <div class="mb-3 row" style="display: flex; align-items: center;">
         <label for="inputLibro" class="col-sm-4 col-form-label">Seleccione el Libro:</label>
         <div class="col-sm-8">
        <select class="form-select" id="id_libros" name="id_libros">
            <?php foreach($LibrosController->listar() as $libro): ?>
                <option value="<?php echo $libro->getIdLibros(); ?>"><?php echo $libro->getTitulo(); ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        </div>
                <div class="mb-3 row">
                    <label for="inputFechaPrestamo" class="col-sm-4 col-form-label">Fecha de Préstamo</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_prestamo" id="inputFechaPrestamo">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputFechaDevolucion" class="col-sm-4 col-form-label">Fecha de Devolución</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_devolucion" id="inputFechaDevolucion">
                    </div>
                </div>
                <div class="mb-3 row">
                <label for="inputEstado" class="col-sm-4 col-form-label">Estado</label>
                <div class="col-sm-8">
                <select class="form-select" name="estado" id="inputEstado">
                <option value="1">Activo</option>
                <option value="0">Finalizado</option>
                </select>
                </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" name="ok1" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Lista de Préstamos</h5>
        </div>
        <div class="card-body">
            <form method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Eliminar</th>
                            <th>ID prestamos</th>
                            <th>Nombre Alumno</th>
                            <th>Nombre Libro</th>
                            <th>Fecha de Préstamo</th>
                            <th>Fecha de Devolución</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         foreach ($prestamosController->listar() as $prestamo) {
                            echo "
                                <tr>
                                    <td><input type='checkbox' name='eliminar[]' value='" . $prestamo->getIdPrestamos() . "' title='Eliminar'></td>
                                    <td>" . $prestamo->getIdPrestamos() . "</td>
                                    <td>" . $prestamo->getIdAlumno() . "</td>
                                    <td>" . $prestamo->getIdLibros() . "</td>
                                    <td>" . $prestamo->getFechaPrestamo() . "</td>
                                    <td>" . $prestamo->getFechaDevolucion() . "</td>
                                    <td>" . ($prestamo->getEstado() == 1 ? 'Activo' : 'Finalizado') . "</td>
                                    <td><a href='update/" . $prestamo->getIdPrestamos() . "'>Actualizar</a></td>
                                </tr>
                            ";
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
                <input class='btn btn-danger' type="submit" value="Eliminar" name="del">
            </form>
        </div>
    </div>
</div>
