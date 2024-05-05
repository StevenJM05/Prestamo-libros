<?php

$escuelas_controller = new escuelas_controller();

if(isset($_POST['ok1'])){
    
    $nombre = $_POST['nombre'];
    $director = $_POST['director'];
    $escuelas = new Escuelas();
    $escuelas->setNombre($nombre);
    $escuelas->setDirector($director);
    
    
    $escuelas_controller->agregar($escuelas);
}

?>


<div class="container mt-5 text-center">
        <h1 class="fw-bold">AGREGAR ESCUELAS</h1>
    </div>
    <div class="container m-7 bg-dark text-white">
    <form method="post" class="m-5 mx-auto"> 
        <div class="col-md-4">
            <div class="form-group mt-3">
                    <label>Nombres de la escuela:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la escuela">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Director:</label>
                    <input type="text" class="form-control" name="director" placeholder="Ingrese el director">
                </div>
            </div>
            <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Agregar</button>
    <a href="escuelas" class="btn btn-outline-warning m-4 mt-3">Regresar</a>
</div>

    </form>
</div> 
</div>