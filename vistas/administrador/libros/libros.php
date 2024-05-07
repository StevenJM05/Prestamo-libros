<?php
$libros_controller = new LibrosController();


if(isset($_POST['del'])){
    if(isset($_POST['eliminar']) && is_array($_POST['eliminar'])) {
        foreach($_POST['eliminar'] as $id_libro) {
            $libros_controller->delete(intval($id_libro));   
        }
        echo "<script>alert('Registro(s) eliminado(s) correctamente');</script>";
    }
}


if(isset($_POST['buscar'])) {
   
    $consulta_busqueda = $_POST['busqueda'];
   
    $resultados = $libros_controller->buscarPorTitulo($consulta_busqueda);
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

<div class="container mt-5 text-center">
    <h1 class="fw-bold">INFORMACIÓN DE LIBROS</h1>
</div>

<div class="container mt-5 position-relative">
    <a class='btn btn-success position-absolute top-0 start-0' href='addlibros'>Agregar Libros</a>
</div>

<br><br>

<form method="post">
    <table class="table table-dark mx-auto" style="width: 80%;">
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
                    <td><input type='checkbox' name='eliminar[]' value='".$libro->getIdlibros()."'></td>
                    <td>".$libro->getIdlibros()."</td>
                    <td>".$libro->getTitulo()."</td>
                    <td>".$libro->getAutor()."</td>
                    <td>".$libro->getEditorial()."</td>
                    <td>".$libro->getFechaEdicion()."</td>
                    <td>".$libro->getISBN()."</td>
                    <td><a href='up_libros/".$libro->getIdlibros()."'>Actualizar</a></td>
                </tr>";
        } 

        ?>
            
            <tr>
                <td colspan="8">
                    <input class='btn btn-danger' type="submit" value="Eliminar" name="del">
                </td>
            </tr>
        </tbody>
    </table>
</form>

<div class="container">
    <form method="post">
        <input type="text" class="form-control" name="busqueda" placeholder="Buscar libros por título">
        <button type="submit" name="buscar" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <?php
    if(isset($resultados)) {
        if ($resultados) {
            echo "<h2>Resultados de la búsqueda:</h2>";
            foreach ($busqueda as $libro) {
                echo "<table>";
                echo "<tr>";

                echo "<td>";
                echo "<p><strong>Título: </strong> " . $libro->getTitulo() . "<br>";
                echo "</td>";

                echo "<td>";
                echo "<p><strong>Autor: </strong> " . $libro->getAutor() . "<br>";
                echo "</td>";

                echo "<td>";
                echo "<p><strong>Editorial: </strong> " . $libro->getEditorial() . "<br>";
                echo "</td>";

                echo "<td>";
                echo "<p><strong>ISBN: </strong> " . $libro->getISBN() . "<br>";
                echo "</td>";

                echo "</tr>";
                echo "</table>";
            }
        } else {
            echo "<p>No se encontraron resultados</p>";
        }

    }
    ?>
</div>

</body>
</html>
