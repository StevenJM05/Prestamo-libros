<?php
$alumnos_controller  = new alumnos_controller();
$prestamosController = new PrestamosController();
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Buscar Préstamos por Nombre de Alumno</h5>
        </div>
        <div class="card-body">
            <form method="post" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="busquedaAlumnos" name="busquedaAlumnos" placeholder="Ingrese el nombre del alumno">
                    <div class="input-group-append">
                        <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>

            <?php if (isset($_POST['buscar'])) : ?>
                <!-- Resultados de la búsqueda -->
                <div class="list-group">
                    <?php foreach ($alumnos_controller->buscarAlumnos($_POST['busquedaAlumnos']) as $alumno) : ?>
                        <a href="?id_alumno=<?php echo $alumno->getIdalumno(); ?>" class="list-group-item list-group-item-action">
                            <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (isset($_GET['id_alumno'])) : ?>
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Préstamos del alumno</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Préstamos Activos:</h6>
                        <hr>
                        <?php foreach ($prestamosController->historial($_GET['id_alumno']) as $prestamo) : ?>
                            <?php if ($prestamo->getEstado() == 1) : ?>
                                <div class="card mb-3">
                                    <div class="card-header bg-secondary text-white">
                                        <h6 class="card-title mb-0"><strong> ID: <?php echo $prestamo->getIdPrestamos() ?><<strong></h6>

                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><strong>Título del libro:</strong> <?php echo $prestamo->getIdLibros() ?></p>
                                        <p class="card-text"><strong>Fecha de préstamo:</strong> <?php echo $prestamo->getFechaPrestamo() ?></p>
                                        <p class="card-text"><strong>Fecha de devolución:</strong> <?php echo $prestamo->getFechaDevolucion() ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-6">
                        <h6>Préstamos Finalizados:</h6>
                        <hr>
                        <?php foreach ($prestamosController->historial($_GET['id_alumno']) as $prestamo) : ?>
                            <?php if ($prestamo->getEstado() == 0) : ?>
                                <div class="card mb-3">
                                    <div class="card-header bg-warning text-dark">
                                        <h6 class="card-title mb-0"><strong>ID: <?php echo $prestamo->getIdPrestamos() ?></strong></h6>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><strong>Título del libro:</strong> <?php echo $prestamo->getIdLibros() ?></p>
                                        <p class="card-text"><strong>Fecha de préstamo:</strong> <?php echo $prestamo->getFechaPrestamo() ?></p>
                                        <p class="card-text"><strong>Fecha de devolución:</strong> <?php echo $prestamo->getFechaDevolucion() ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <a href="prestamos" class="btn btn-dark mt-3">Regresar</a>
</div>
