<?php
$libros_controller = new LibrosController();
$info = explode("/",$_GET["url"]);
$id = $info[1];
$filtrar_libro = $libros_controller->buscarPorId($id); 
if(isset($_POST["ok1"])){
    $libros = new Libros("", $_POST['titulo'], $_POST['autor'], $_POST['editorial'], $_POST['fecha_edicion'], $_POST['ISBN']);
    $libros_controller->update($libros, $id); 
    header("Location: http://localhost/Prestamo-libros/libros");
}

?>

<div class="container mt-5 text-center">
    <h1 class="fw-bold">ACTUALIZAR ALUMNOS</h1>
</div>

<div class="container m-6 bg-dark text-white">
    <form method="post" class="m-5 mx-auto">
        <div class="row"> 
            <div class="col-md-4">
                <div class="form-group mt-4 mx-3">
                    <label>Titulo del libro:</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Ingrese el título del libro" value="<?php echo $filtrar_libro['titulo']; ?>">
                </div>
                <div class="form-group mt-4 mx-3">
                    <label>Nombre del autor:</label>
                    <input type="text" class="form-control" name="autor" placeholder="Ingrese el nombre del autor" value="<?php echo $filtrar_libro['autor']; ?>">
                </div>
                </div>
                <div class="form-group mt-4 mx-3">
                    <label>Editorial:</label>
                    <input type="text" class="form-control" name="editorial" placeholder="Ingrese el editorial" value="<?php echo $filtrar_libro['editorial']; ?>">
                </div>
            <div class="form-group mt-4 mx-3">
                <label>Fecha de edicion:</label>
                <input type="date" class="form-control" name="fecha_edicion" placeholder="Ingrese la fecha de edición" value="<?php echo $filtrar_libro['fecha_edicion']; ?>">
            </div>
        </div>
        <div class="form-group mt-4 mx-3">
            <label>ISBN:</label>
            <input type="text" class="form-control" name="ISBN" placeholder="Ingrese el ISBN" value="<?php echo $filtrar_libro['ISBN']; ?>">
        </div>
    </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Actualizar</button>
            <a href="libros" class="btn btn-outline-warning m-4 mt-3">Regresar</a>
        </div>
    </form>
</div>
