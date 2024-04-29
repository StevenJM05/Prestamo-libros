<?php

$alumnos_controller = new alumnos_controller();

if(isset($_POST['ok1'])){

  /*   id_libros INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150),
    autor VARCHAR(150),
    editorial VARCHAR(50),
    fecha_edicion DATE,
    ISBN VARCHAR(100) */

    $id_libros = $_POST['id_libros'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $fecha_edicion = $_POST['fecha_edicion'];
    $ISBN = $_POST['ISBN'];

    $libros = new alumnos($_POST['id_libros'], $_POST['titulo'], $_POST['editorial'], $_POST['fecha_edicion'], $_POST['ISBN']);
    $libros_controller->agregar($id_libros, $titulo, $editorial, $fecha_edicion, $ISBN);
}
?>


<div class="container mt-5 text-center">
        <h1 class="fw-bold">AGREGAR ALUMNOS</h1>
    </div>
    <div class="container m-7 bg-dark text-white">

    <form method="post" class="m-5 mx-auto"> 
            <div class="col-md-4">
            <div class="form-group mt-3">
                    <label>Titulo de libro:</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo del libro">
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group mt-3">
                    <label>Ingresar nombre del autor:</label>
                    <input type="text" class="form-control" name="autor" placeholder="Ingrese nombre del autor">
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group mt-3">
                    <label>Ingrese el editorial:</label>
                    <input type="text" class="form-control" name="editorial" placeholder="Ingrese el editorial">
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group mt-3">
                    <label> Ingrese la fecha de edicion:</label>
                    <input type="text" class="form-control" name="fecha_edicion" placeholder="Ingrese la fecha de edicion">
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group mt-3">
                    <label>ISBN:</label>
                    <input type="text" class="form-control" name="ISBN" placeholder="Ingrese el ISBN">
            </div>
            </div>
    </form>

    
</div> 
</div>
<?php


?>