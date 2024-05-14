<?php
$escuelas_controller = new escuelas_controller();
$info = explode("/",$_GET["url"]);
$id = $info[1];
$filtrar_libro = $escuelas_controller->buscarPorId($id); 
if(isset($_POST['ok1'])){
    $escuelas = new Escuelas("", $_POST['nombre'], $_POST['director']);
    $escuelas_controller->update($escuelas, $id);
    header("Location: http://localhost/Prestamo-libros/escuelas");
    exit();
}

?>


<div class="container mt-5" style="margin-left: 100px;">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Actualizar escuela</h5>
        </div>

</div>

<div class="card-body">
       <form method="post">
        <div class="col-md-4">
            <div class="form-group mt-2">
                <label>Nombres de la escuela:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la escuela" value="<?php echo $filtrar_libro['nombre'];?>">         
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mt-2">
                <label>Director:</label>
                <input type="text" class="form-control" name="director" placeholder="Ingrese el director" value="<?php echo $filtrar_libro['director'];?>">       
                 </div>
        </div>
        <table>
    <button type="submit" class="btn btn-outline-dark" name="ok1">Actualizar</button>
           <!-- <a href="escuelas" class="btn btn-outline-dark m-4">Regresar</a>-->
    </table>
    </form>
   
</div>
