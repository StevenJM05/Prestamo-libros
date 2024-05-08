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
                <a class='btn btn-success ' href='addlibros'>Agregar Libros</a>
                </td>
            </tr>
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
        echo "<table>";
        echo "<tr>";
        echo "<th>Título</th>";
        echo "<th>Autor</th>";
        echo "<th>Editorial</th>";
        echo "<th>ISBN</th>";
        echo "</tr>";
        
        foreach ($busqueda as $libro) {
            echo "<tr>";
            echo "<td>" . $libro->getTitulo() . "</td>";
            echo "<td>" . $libro->getAutor() . "</td>";
            echo "<td>" . $libro->getEditorial() . "</td>";
            echo "<td>" . $libro->getISBN() . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados</p>";
    }
}
?>

</div>

</body>
</html>
