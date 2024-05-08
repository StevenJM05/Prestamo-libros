<?php
$prestamosController = new PrestamosController();   

?>

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
                                    <td>" . $prestamo->getIdPrestamos() . "</td>
                                    <td>" . $prestamo->getIdAlumno() . "</td>
                                    <td>" . $prestamo->getIdLibros() . "</td>
                                    <td>" . $prestamo->getFechaPrestamo() . "</td>
                                    <td>" . $prestamo->getFechaDevolucion() . "</td>
                                    <td>" . ($prestamo->getEstado() == 1 ? 'Activo' : 'Finalizado') . "</td>
                                    <td><a href='up_prestamo/" . $prestamo->getIdPrestamos() . "' class='btn btn-success'>Actualizar</a></td>

                                </tr>
                            ";
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
               <a href="addprestamo" class="btn btn-outline-dark">Agregar</a>
               <a href="pres_alumnos" class="btn btn-outline-dark">Historial por alumno</a>
               <a href="pres_fecha" class="btn btn-outline-dark">Libros por fecha</a>
               <a href="estado" class="btn btn-outline-dark">Prestamos por estado</a>
            </form>
        </div>
    </div>
</div>


