<?php
$alumnos_controller  = new alumnos_controller();
$prestamosController = new PrestamosController();  
$prestatamoshistorial = [];
if (isset($_POST["buscar"])) {
    $id_alumno = $_POST["id_alumno"];
    $prestatamoshistorial = $prestamosController->historial($id_alumno);
}
?>


<div class="container mt-5" style="margin-left: 100px;">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Buscar Préstamos por Nombre de Alumno</h5>
        </div>
        <div class="col-sm-8">
    <form method="POST" action="">
        <input type="text" class="form-control" id="busquedaAlumnos" name="busquedaAlumnos" placeholder="Ingrese el nombre del alumno">
        <button type="submit" name="buscar2" class="btn btn-primary mt-2">Buscar</button>
    </form>
</div>
</div>

<?php 
if (isset($_POST['buscar2'])) {
    $nombre_alumno = $_POST['busquedaAlumnos'];
    $alumnos = $alumnos_controller->buscarAlumnos($nombre_alumno);
    // Asumiendo que buscarAlumnos devuelve un array de objetos Alumno
    foreach ($alumnos as $alumno) {
        $prestamos = $prestamosController->historial($alumno->getIdalumno());
        if (!empty($prestamos)) {
            ?>
            <!-- Resultados de búsqueda -->
            <div class="mb-3 row" style="display: flex; align-items: center;" id="resultadosAlumnos">
                <label for="id_alumno" class="col-sm-4 col-form-label">Resultados:</label>
                <div class="col-sm-8">
                    <ul class="list-group">
                        <li class="list-group-item mt-2">
                            <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Tabla de préstamos -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID préstamo</th>
                        <th>Nombre Libro</th>
                        <th>Fecha de Préstamo</th>
                        <th>Fecha de Devolución</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prestamos as $prestamo) : ?>
                        <tr>
                            <td><?php echo $prestamo->getIdPrestamos(); ?></td>
                            <td><?php echo $prestamo->getNombreLibro(); ?></td>
                            <td><?php echo $prestamo->getFechaPrestamo(); ?></td>
                            <td><?php echo $prestamo->getFechaDevolucion(); ?></td>
                            <td><?php echo ($prestamo->getEstado() == 1 ? 'Activo' : 'Finalizado'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } else {
            // Si no hay préstamos para este alumno
            echo "<p>No se encontraron préstamos para este alumno.</p>";
        }
    }
}
?>

            </form>

            

                <table class="table">
                    <thead>
                        <tr>
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
                         foreach ($prestatamoshistorial as $prestamo) {
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
                        
                        ?>
                        
                    </tbody>
                </table>
               <a href="prestamos" class="btn btn-dark">Regresar</a>

            </form>
        </div>
    </div>
</div>
