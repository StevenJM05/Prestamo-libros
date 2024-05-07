<?php
$escuelas_controller = new escuelas_controller();
$info = explode("/",$_GET["url"]);
$id = $info[1];
$filtrar_libro = $escuelas_controller->buscarPorId($id); 
if(isset($_POST['ok1'])){
    $escuelas = new Escuelas("", $_POST['nombre'], $_POST['director']);
    $escuelas_controller->update($escuelas, $id);
    header("Location: http://localhost/Prestamo-libros/escuelas");
}

?>


<div class="container mt-5 text-center">
    <h1 class="fw-bold">ACTUALIZAR ESCUELA</h1>
</div>

<div class="container m-7 bg-dark text-white">
    <form method="post" class="m-5 mx-auto">
        <div class="col-md-4">
            <div class="form-group mt-3">
                <label>Nombres de la escuela:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la escuela" value="<?php echo $filtrar_libro['nombre'];?>">         
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mt-3">
                <label>Director:</label>
                <input type="text" class="form-control" name="director" placeholder="Ingrese el director" value="<?php echo $filtrar_libro['director'];?>">       
                 </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Actualizar</button>
            <a href="escuelas" class="btn btn-outline-warning m-4 mt-3">Regresar</a>
        </div>
    </form>
</div>
