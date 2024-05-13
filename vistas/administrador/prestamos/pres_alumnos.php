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
        <div class="card-body">
            <form method="post" class="mb-4">
                <div class="input-group">
                    <select class="form-select" id="id_alumno" name="id_alumno">
                    <option value="">Seleccione Alumno</option>
                        <?php foreach($alumnos_controller->listar2() as $alumno): ?>
                            <option value="<?php echo $alumno->getIdAlumno(); ?>">
                                <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
                </div>
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
