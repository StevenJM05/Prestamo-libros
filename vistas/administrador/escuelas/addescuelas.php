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


<div class="container mt-5">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Agregar escuelas</h5>
        </div>

</div>
  
        <div class="card-body">
    <form method="post"> 
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

   
</div>

    </form>
    <table>
    <button type="submit" class="btn btn-outline-dark " name="ok1">Agregar</button>
    <a href="escuelas" class="btn btn-outline-dark m-2">Regresar</a>
    </table>
</div> 
</div>