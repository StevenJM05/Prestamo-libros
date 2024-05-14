<?php

$libros_controller = new LibrosController();

if (isset($_POST['ok1'])) {
        $libros = new Libros("", $_POST['titulo'], $_POST['autor'], $_POST['editorial'], $_POST['fecha_edicion'], $_POST['ISBN']);
        $libros_controller->agregar($libros);
}
?>

<div class="container mt-5" style="margin-left: 100px;">
        <div class="card">
                <div class="card-header bg-dark text-white">
                        <h5 class="card-title mb-0">Agregar Nuevo libro</h5>
                </div>
                <div class="card-body">
                        <form method="post">
                                <div class="col-md-4">
                                        <div class="mb-3 row" style="display: flex; align-items: center;">
                                                <label>Titulo de libro:</label>
                                                <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo del libro">
                                        </div>
                                </div>
                                <div class="mb-3 row" style="display: flex; align-items: center;">
                                        <div class="form-group mt-3">
                                                <label>Ingresar nombre del autor:</label>
                                                <input type="text" class="form-control" name="autor" placeholder="Ingrese nombre del autor">
                                        </div>
                                </div>
                                <div class="mb-3 row" style="display: flex; align-items: center;">
                                        <div class="form-group mt-3">
                                                <label>Ingrese el editorial:</label>
                                                <input type="text" class="form-control" name="editorial" placeholder="Ingrese el editorial">
                                        </div>
                                </div>
                                <div class="mb-3 row" style="display: flex; align-items: center;">
                                        <div class="form-group mt-3">
                                                <label> Ingrese la fecha de edicion:</label>
                                                <input type="date" class="form-control" name="fecha_edicion" placeholder="Ingrese la fecha de edicion">
                                        </div>
                                </div>
                                <div class="mb-3 row" style="display: flex; align-items: center;">
                                        <div class="form-group mt-3">
                                                <label>ISBN:</label>
                                                <input type="text" class="form-control" name="ISBN" placeholder="Ingrese el ISBN">
                                        </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                
                                <button type="submit" class="btn btn-outline-dark m-2" name="ok1">Agregar</button>
                                <a href="libros" class="btn btn-outline-dark m-2">Regresar</a>
                                </div>
                                
                        </form>
                </div>
        </div>
</div>