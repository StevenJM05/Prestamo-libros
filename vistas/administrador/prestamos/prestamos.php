<?php
$prestamosController = new PrestamosController();   
if(isset($_POST['del'])){

    if(isset($_POST['eliminar']) && is_array($_POST['eliminar'])) {
        foreach($_POST['eliminar'] as $idprestamos) {
            $prestamosController->delete(intval($idprestamos)); 
            
        }
    }

}

?>

<div class="container mt-5" style="margin-left: 100px;">

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Lista de Préstamos</h5>
        </div>
        
        <div class="card-body">
            <form method="post">
            <td colspan="8">
                <input class='btn btn-danger' type="submit" value="Eliminar" name="del">
            </td>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
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
                                <td><input type='checkbox'  name='eliminar[]' value='".$prestamo->getIdPrestamos()."' title=' ' > </td>
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


