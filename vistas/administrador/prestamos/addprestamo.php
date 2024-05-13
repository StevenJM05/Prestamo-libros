<?php
@session_start();
$alumnos_controller  = new alumnos_controller();
$LibrosController = new LibrosController();
$prestamosController = new PrestamosController();
if (isset($_POST['ok1'])) {
    $prestamo = new Prestamos("", $_POST['id_alumno'], $_POST['id_libros'], $_POST['fecha_prestamo'], $_POST['fecha_devolucion'], $_POST['estado']);
    $prestamosController->agregar($prestamo);
}
?>
<form method="post">
    <div class="container mt-5" style="margin-left: 100px;">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title mb-0">Agregar Nuevo Préstamo</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <!--busqueda-->
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="busquedaAlumnos" class="col-sm-4 col-form-label">Buscar Alumno:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="busquedaAlumnos" name="busquedaAlumnos" placeholder="Ingrese el nombre del alumno">
                            <button type="submit" name="buscar" class="btn btn-primary mt-2">Buscar</button>
                        </div>
                    </div>
                    <?php if (isset($_POST['buscar'])) : ?>
                        <!-- Resultados de búsqueda -->
                        <div class="mb-3 row" style="display: flex; align-items: center;">
                            <label for="id_alumno" class="col-sm-4 col-form-label">Resultados:</label>
                            <div class="col-sm-8">
                                <ul class="list-group">
                                    <?php foreach ($alumnos_controller->buscarAlumnos($_POST['busquedaAlumnos']) as $alumno) : ?>
                                        <li class="list-group-item mt-2">
                                            <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                                            <form method="post" style="display: inline;">
                                                <input type="hidden" name="id" value="<?php echo $alumno->getIdAlumno(); ?>">
                                                <input type="hidden" name="nombre" value="<?php echo $alumno->getNombres(); ?>">
                                                <button type="submit" name="seleccionar" class="btn btn-primary btn-sm">Seleccionar</button>
                                            </form>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <!--Session para guardar los datos del alumno selecionado-->
                    <?php endif;

                    if (isset($_POST['seleccionar'])) {
                        $info = array();
                        $info['id_alumno'] = $_POST['id'];
                        $info['nombre'] = $_POST['nombre'];
                        $_SESSION["Alumno"] = $info;
                    }
                    if (isset($_POST['buscar_libro'])) {
                        $info = array();
                        $info['id_libro'] = $_POST['idl'];
                        $info['titulo'] = $_POST['titulo'];
                        $_SESSION["Libro"] = $info;
                    }
                    ?>
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="alumno" class="col-sm-4 col-form-label">Alumno Seleccionado: </label>
                        <div class="col-sm-8">
                            <input disabled type="text" value="<?php echo isset($_SESSION['Alumno']) ? $_SESSION['Alumno']['nombre'] : ''; ?>" class="form-control">
                            <input type="hidden" name="id_alumno" value="<?php echo isset($_SESSION['Alumno']) ? $_SESSION['Alumno']['id_alumno'] : ''; ?>">
                        </div>
                    </div>
                 <!--Libros-->
                    <div class="mb-3 row" style="display: felx; align-items: center;">
                        <label for="inputLibro" class="col-sm-4 col-form-label">Seleccione el Libro:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="busquedaLibros" name="busquedaLibros" placeholder="Ingrese el título del libro">
                            <button type="submit" name="buscar_libro" class="btn btn-primary mt-2">Buscar</button>
                        </div>
                    </div>
                    <!--libros-->
                    <?php if (isset($_POST['buscar'])) : ?>
                        <!-- Resultados de búsqueda -->
                        <div class="mb-3 row" style="display: flex; align-items: center;">
                            <label for="id_alumno" class="col-sm-4 col-form-label">Resultados:</label>
                            <div class="col-sm-8">
                                <ul class="list-group">
                                    <?php foreach ($LibrosController->buscarLibros($_POST['busquedaLibros']) as $Libro) : ?>
                                        <li class="list-group-item mt-2">
                                            <?php echo $libro->getTitulo();?>
                                            <form method="post" style="display: inline;">
                                                <input type="hidden" name="idL" value="<?php echo $libro->getIdLibros(); ?>">
                                                <input type="hidden" name="nombre" value="<?php echo $libro->getTitulo(); ?>">
                                                <button type="submit" name="seleccionar" class="btn btn-primary btn-sm">Seleccionar</button>
                                            </form>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Campo de libro seleccionado -->
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="libroSeleccionado" class="col-sm-4 col-form-label">Libro Seleccionado:</label>
                        <div class="col-sm-8">
                            <input disabled type="text" value="<?php echo isset($_SESSION['Libro']) ? $_SESSION['Libro']['titulo'] : ''; ?>" class="form-control">
                            <input type="hidden" name="id_libro" value="<?php echo isset($_SESSION['Libro']) ? $_SESSION['Libro']['id_libro'] : ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="inputFechaPrestamo" class="col-sm-4 col-form-label">Fecha de Préstamo</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha_prestamo" id="inputFechaPrestamo">
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="inputFechaDevolucion" class="col-sm-4 col-form-label">Fecha de Devolución</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha_devolucion" id="inputFechaDevolucion">
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="inputEstado" class="col-sm-4 col-form-label">Estado</label>
                        <div class="col-sm-8">
                            <select class="form-select" name="estado" id="inputEstado">
                                <option value="1">Activo</option>
                                <option value="0">Finalizado</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" name="ok1" class="btn btn-dark">Agregar</button>
                            <a href="prestamos" class="btn btn-success text-white">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>