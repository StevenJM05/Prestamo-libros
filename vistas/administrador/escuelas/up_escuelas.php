<?php
$escuelas_controller = new escuelas_controller();
$info = explode("/",$_GET["url"]);
$id = $info[1];

if(isset($_POST['ok1'])){
    $escuelas = new Escuelas("", $_POST['nombre'], $_POST['director']);
    $escuelas_controller->update($escuelas, $id);
    header("Location: " . "escuelas");

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
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la escuela" value="<?php echo $fila['nombre']; ?>">         
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mt-3">
                <label>Director:</label>
                <input type="text" class="form-control" name="director" placeholder="Ingrese el director" value="<?php echo $director; ?>">       
                 </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Actualizar</button>
        </div>
    </form>
</div>
