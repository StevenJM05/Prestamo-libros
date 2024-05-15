<?php
$prestamosController = new PrestamosController();   
if(isset($_POST['del'])){

    if(isset($_POST['elementos']) && is_array($_POST['elementos'])) {
        foreach($_POST['elementos'] as $idprestamos) {
            $prestamosController->delete(intval($idprestamos)); 
            
        }
    }
}

if(isset($_POST["finalizado"])){
    if(isset($_POST['elementos']) && is_array($_POST['elementos'])) {
        foreach($_POST['elementos'] as $idprestamos) {
            $prestamosController->finalizar(intval($idprestamos)); 
            
        }
    }
}

?>

<div class="container mt-5" style="margin-left: 100px;">

<a href="addprestamo" class="btn btn-outline-dark">Agregar</a>
    <a href="pres_alumnos" class="btn btn-outline-dark">Historial por alumno</a>
        <a href="pres_fecha" class="btn btn-outline-dark">Libros por fecha</a>
             <a href="estado" class="btn btn-outline-dark">Prestamos por estado</a>
             
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Lista de Préstamos</h5>
        </div>
        
        <div class="card-body">
            <form method="post">
            <div class="contaniner m-3">
            <td colspan="8">
                <input class='btn btn-danger' type="submit" value="Eliminar" name="del">
                <input class="btn btn-warning" type="submit" value="finalizar" name="finalizado">
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
                                <td><input type='checkbox'  name='elementos[]' value='".$prestamo->getIdPrestamos()."' title=' ' > </td>
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
            
            </td>
            </div>

            </form>
        </div>
    </div>
</div>


