<?php
$alumnos_controller  = new alumnos_controller();
$prestamosController = new PrestamosController();

?>

<div class="container mt-5" style="margin-left: 100px;">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Buscar Préstamos por Nombre de Alumno</h5>
        </div>
        <div class="card-body">
            <form method="post" class="mb-4">
                <label for="busquedaAlumnos" class="col-sm-4 col-form-label">Buscar Alumno:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="busquedaAlumnos" name="busquedaAlumnos" placeholder="Ingrese el nombre del alumno">
                    <button type="submit" name="buscar" class="btn btn-primary mt-2">Buscar</button>
                </div>
            </form>

            <?php if (isset($_POST['buscar'])) : ?>
                <!-- Resultados de la búsqueda -->
                <div class="mb-3 row" style="display: flex; align-items: center;" id="resultadosAlumnos">
                    <label for="id_alumno" class="col-sm-4 col-form-label">Resultados:</label>
                    <div class="col-sm-8">
                        <form method="post"> <!-- Nueva etiqueta form aquí -->
                            <ul class="list-group">
                                <?php foreach ($alumnos_controller->buscarAlumnos($_POST['busquedaAlumnos']) as $alumno) : ?>
                                    <li class="list-group-item mt-2">
                                        <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                                        <input type="hidden" name="id_alumno" value="<?php echo $alumno->getIdalumno() ?>">
                                        <button type="submit" class="btn btn-primary btn-sm" name="filtrar">Seleccionar</button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID préstamos</th>
                <th>Nombre Alumno</th>
                <th>Nombre Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['filtrar'])) {
                foreach ($prestamosController->historial($_POST['id_alumno']) as $prestamo) {
                    echo "
                        <tr>
                            <td>" . $prestamo->getIdPrestamos() . "</td>
                            <td>" . $prestamo->getIdAlumno() . "</td>
                            <td>" . $prestamo->getIdLibros() . "</td>
                            <td>" . $prestamo->getFechaPrestamo() . "</td>
                            <td>" . $prestamo->getFechaDevolucion() . "</td>
                            <td>" . ($prestamo->getEstado() == 1 ? 'Activo' : 'Finalizado') . "</td>
                        </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
    <a href="prestamos" class="btn btn-dark">Regresar</a>
</div>
