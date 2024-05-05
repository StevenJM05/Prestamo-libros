<?php

$libros_controller = new LibrosController();

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
<body style="background-color: #f0f0f0;">

<div class="container mt-5 text-center">
        <h1 class="fw-bold">INFORMACIÓN DE LIBROS</h1>
    </div>

    <div class="container mt-5 position-relative" style="margin-left: 210px; margin-top: -15px;">
    <a class='btn btn-success position-absolute top-0 start-0' href='addlibros'>Agregar Libros</a>
</div>

</div>
<br><br>

<form method=post >
<table class="table table-dark mx-auto" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id Libros</th>
                <th scope="col">Titulo</th>
                <th scope="col">autor</th>
                <th scope="col">Editorial</th>
                <th scope="col">fecha_edicion</th>
                <th scope="col">ISBN</th>
                <th>Act</th>
            </tr>
        </thead>
        <tbody>

        <?php 
        foreach ($libros_controller->listar() as $aggal) {

            echo "
                        <tr  >
                            <td  > <input type='checkbox'  name='eliminar[]' value=' ' title=' ' > </td>
                            <td>" . $aggal->getIdlibros() . "</td>
                            <td>" . $aggal->getTitulo() . "</td>
                            <td>" . $aggal->getAutor() . "</td>
                            <td>" . $aggal->getEditorial() . "</td>
                            <td>" . $aggal->getFechaEdicion() . "</td>
                            <td>" . $aggal->getISBN() . "</td>
                            <td><a href='up_libros/" . $aggal->getIdlibros()  . " '>A </a></td>
                        </tr>
                        ";
    

           } 
            
            ?>

            
            <tr>
                <td colspan=13>
                    
                    <input class='btn btn-danger' type="submit" value="Eliminar" name=del >
                    
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>


</div>
</div>