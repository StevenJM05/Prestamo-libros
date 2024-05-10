<?php
$libros_controller = new LibrosController();


if (isset($_POST['del'])) {
    if (isset($_POST['eliminar']) && is_array($_POST['eliminar'])) {
        foreach ($_POST['eliminar'] as $id_libro) {
            $libros_controller->delete(intval($id_libro));
        }
        echo "<script>alert('Registro(s) eliminado(s) correctamente');</script>";
    }
}




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Libros</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS para estilos -->
</head>

<body>


    <div class="container mt-5" style="margin-left: 100px;">

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title mb-0">Información de libros</h5>
            </div>

            <div class="card-body">
                <form method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Libros</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Editorial</th>
                                <th scope="col">Fecha Edición</th>
                                <th scope="col">ISBN</th>
                                <th>Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($libros_controller->listar() as $libro) {
                                echo "
                <tr>
                    <td><input type='checkbox' name='eliminar[]' value='" . $libro->getIdlibros() . "'></td>
                    <td>" . $libro->getIdlibros() . "</td>
                    <td>" . $libro->getTitulo() . "</td>
                    <td>" . $libro->getAutor() . "</td>
                    <td>" . $libro->getEditorial() . "</td>
                    <td>" . $libro->getFechaEdicion() . "</td>
                    <td>" . $libro->getISBN() . "</td>
                    <td><a href='up_libros/" . $libro->getIdlibros() . "' class='btn btn-success'>Actualizar</a></td>
                </tr>";
                            }

                            ?>



                        </tbody>
                    </table>
                    <table>
                        <a class='btn btn-outline-dark' href='addlibros'>Agregar Libros</a>
                        <input class='btn btn-outline-dark' type="submit" value="Eliminar" name="del">

                    </table>
                </form>
            </div>











            <div class="container">
                <form method="post">
                    <input type="text" class="form-control" name="busqueda" placeholder="Buscar libros por título">
                    <button type="submit" name="buscar" class="btn btn-outline-dark m-2">Buscar</button>
                </form>

                <?php

                if (isset($_POST['buscar'])) {

                    $consulta_busqueda = $_POST['busqueda'];

                    $resultados = $libros_controller->buscarPorTitulo($consulta_busqueda);
                }
                if (isset($resultados)) {
                    if ($resultados) {
                        echo "<h2>Resultados de la búsqueda:</h2>";
                        echo "<table class='table'>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Título</th>";
                        echo "<th>Autor</th>";
                        echo "<th>Editorial</th>";
                        echo "<th>Fecha edicion</th>";
                        echo "<th>ISBN</th>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>" . $resultados["id_libros"] . "</td>";
                        echo "<td>" . $resultados["titulo"] . "</td>";
                        echo "<td>" .$resultados["autor"]  . "</td>";
                        echo "<td>" . $resultados["editorial"] . "</td>";
                        echo "<td>" . $resultados["fecha_edicion"] . "</td>";
                        echo "<td>" . $resultados["ISBN"] . "</td>";
                        echo "</tr>";

                        echo "</table>";
                    } else {
                        echo "<p>No se encontraron resultados</p>";
                    }
                }
                ?>

            </div>

</body>

</html>