<!-- <?php

$libros_controller = new LibrosController();
$info = explode("/",$_GET["url"]);
$id = $info[1];

if(isset($_POST['ok1'])){

    $libros = new Libros($_POST['titulo'], $_POST['editorial'], $_POST['fecha_edicion'], $_POST['ISBN']);
    $libros_controller->update($id_libros, $titulo, $editorial, $fecha_edicion, $ISBN);
    header("Location: " . "libros");
}
?>

<?php


?> -->
<form method="post">

<div class="container">
    <input type="text" class="form-control" name="titulo" value="<?php echo $libros_controller->listar()[0]->getTitulo(); ?>" placeholder="Ingrese el título del libro">
</div>

<div class="container">
    <input type="text" class="form-control" name="autor" value="<?php echo $libros_controller->listar()[0]->getAutor(); ?>" placeholder="Ingrese el nombre del autor">
</div>

<div class="container">
    <input type="text" class="form-control" name="editorial" value="<?php echo $libros_controller->listar()[0]->getEditorial(); ?>" placeholder="Ingrese el editorial">
</div>

<div class="container">
    <input type="date" class="form-control" name="fecha_edicion" value="<?php echo $libros_controller->listar()[0]->getFechaEdicion(); ?>" placeholder="Ingrese la fecha de edición">
</div>

<div class="container">
    <input type="text" class="form-control" name="ISBN" value="<?php echo $libros_controller->listar()[0]->getISBN(); ?>" placeholder="Ingrese el ISBN">
</div>

<div class="container">
    <div class="offset-sm-4 col-sm-8">
        <button type="submit" name="ok1" class="btn btn-primary">Actualizar</button>
        <a href="libros" class="btn btn-warning text-white">Volver</a>
    </div>
</div>

</form>
