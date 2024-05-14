<?php
$alumnos_controller  = new alumnos_controller();
$LibrosController = new LibrosController();
$prestamosController = new PrestamosController();

$info = explode("/", $_GET["url"]);
$idPrestamo = $info[1];

$prestamoActual = $prestamosController->obtenerPrestamoPorId($idPrestamo);

if (isset($_POST['ok1'])) {

    $idAlumno = $_POST['id_alumno'];
    $idLibro = $_POST['id_libros'];
    $fechaPrestamo = $_POST['fecha_prestamo'];
    $fechaDevolucion = $_POST['fecha_devolucion'];
    $estado = $_POST['estado'];


    $prestamo = new Prestamos();
    $prestamo->setIdAlumno($idAlumno);
    $prestamo->setIdLibros($idLibro);
    $prestamo->setFechaPrestamo($fechaPrestamo);
    $prestamo->setFechaDevolucion($fechaDevolucion);
    $prestamo->setEstado($estado);

    $prestamosController->actualizar($prestamo, $idPrestamo);
    
}

?>


<form method="post">
    <div class="container mt-5" style="margin-left: 100px;">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title mb-0">Modificar prestamo</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="id_alumno" class="col-sm-4 col-form-label">Nombre del Alumno:</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_alumno" name="id_alumno">
                                <?php foreach ($alumnos_controller->listar2() as $alumno) :
                                    $selected = ($alumno->getIdAlumno() == $prestamoActual['id_alumno']) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $alumno->getIdAlumno(); ?>" <?php echo $selected; ?>>
                                        <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="inputLibro" class="col-sm-4 col-form-label">Seleccione el Libro:</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="id_libros" name="id_libros">
                                <?php foreach ($LibrosController->listar() as $libro) :
                                    $selected = ($libro->getIdLibros() == $prestamoActual['id_libros']) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $libro->getIdLibros(); ?>" <?php echo $selected; ?>>
                                        <?php echo $libro->getTitulo(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputFechaPrestamo" class="col-sm-4 col-form-label">Fecha de Préstamo</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha_prestamo" id="inputFechaPrestamo" value="<?php echo date('Y-m-d', strtotime($prestamoActual['fecha_prestamo'])); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputFechaDevolucion" class="col-sm-4 col-form-label">Fecha de Devolución</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha_devolucion" id="inputFechaDevolucion" value="<?php echo date('Y-m-d', strtotime($prestamoActual['fecha_devolucion'])); ?>">
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
                            <button type="submit" name="ok1" class="btn btn-dark">Modificar</button>
                            <a href="prestamos" class="btn btn-success text-white">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>