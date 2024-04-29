<?php
if(isset($_POST['ok1'])){
    // Recopilar los datos del formulario
    $id_alumno = $_POST['id_alumno'];
    $id_libro = $_POST['id_libro'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $estado = $_POST['estado'];
 
    $prestamo = new Prestamos();
    $prestamosController = new PrestamosController();   
    $prestamosController->agregar($prestamo);
}
?>

            <form method="post">
            <div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Agregar Nuevo Préstamo</h5>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3 row">
                    <label for="inputAlumno" class="col-sm-4 col-form-label">ID del Alumno</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_alumno" id="inputAlumno" placeholder="Ingrese el ID del alumno">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputLibro" class="col-sm-4 col-form-label">ID del Libro</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_libro" id="inputLibro" placeholder="Ingrese el ID del libro">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputFechaPrestamo" class="col-sm-4 col-form-label">Fecha de Préstamo</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_prestamo" id="inputFechaPrestamo">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputFechaDevolucion" class="col-sm-4 col-form-label">Fecha de Devolución</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="fecha_devolucion" id="inputFechaDevolucion">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEstado" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="estado" id="inputEstado" placeholder="Ingrese el estado del préstamo">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" name="ok1" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
                            <th>Eliminar</th>
                            <th>ID Alumno</th>
                            <th>ID Libro</th>
                            <th>Fecha de Préstamo</th>
                            <th>Fecha de Devolución</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <input class='btn btn-danger' type="submit" value="Eliminar" name="del">
            </form>
        </div>
    </div>
</div>
