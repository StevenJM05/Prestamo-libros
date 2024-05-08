<?php
$prestamosController = new PrestamosController();  
$prestatamoshistorial = [];
if (isset($_POST["buscar"])) {
    $estado = $_POST["estado"];
    $prestatamoshistorial = $prestamosController->estado($estado);
}
?>


<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Buscar prestamo por Estado</h5>
        </div>
        <div class="card-body">
            <form method="post" class="mb-4">
               
                <div class="mb-3 row">
                    <label for="selectEstado" class="col-sm-4 col-form-label">Estado del Préstamo</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="selectEstado" name="estado">
                            <option value="">Seleccione el Estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Finalizado</option>
                            
                            
                        </select>
                    </div>
                </div>
                <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>            
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