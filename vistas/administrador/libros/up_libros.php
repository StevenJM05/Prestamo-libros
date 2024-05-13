<?php
$libros_controller = new LibrosController();
$info = explode("/", $_GET["url"]);
$id = $info[1];
$filtrar_libro = $libros_controller->buscarPorId($id);
if (isset($_POST["ok1"])) {
    $libros = new Libros("", $_POST['titulo'], $_POST['autor'], $_POST['editorial'], $_POST['fecha_edicion'], $_POST['ISBN']);
    $libros_controller->update($libros, $id);
}

?>

<div class="container mt-5" style="margin-left: 100px;">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Actualizar libros</h5>
        </div>

        <div class="card-body">
            <form method="post">



                <label>Titulo del libro:</label>
                <input type="text" class="form-control" name="titulo" placeholder="Ingrese el título del libro" value="<?php echo $filtrar_libro['titulo']; ?>">

                <label>Nombre del autor:</label>
                <input type="text" class="form-control" name="autor" placeholder="Ingrese el nombre del autor" value="<?php echo $filtrar_libro['autor']; ?>">

                <label>Editorial:</label>
                <input type="text" class="form-control" name="editorial" placeholder="Ingrese el editorial" value="<?php echo $filtrar_libro['editorial']; ?>">


                <label>Fecha de edicion:</label>
                <input type="date" class="form-control" name="fecha_edicion" placeholder="Ingrese la fecha de edición" value="<?php echo $filtrar_libro['fecha_edicion']; ?>">

                <label>ISBN:</label>
                <input type="text" class="form-control" name="ISBN" placeholder="Ingrese el ISBN" value="<?php echo $filtrar_libro['ISBN']; ?>">


                <button type="submit" class="btn btn-outline-dark" name="ok1">Actualizar</button>
                <a href="libros" class="btn btn-outline-dark m-2">Regresar</a>

            </form>
        </div>
    </div>
</div>