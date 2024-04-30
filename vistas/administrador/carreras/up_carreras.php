<?php
$carreras_controller = new carreras_controller();

if(isset($_POST['ok1'])){
    
    $carreras = new carreras("","", $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->update($carreras, $id);
}
?>

<div class="container mt-5 text-center">
        <h1 class="fw-bold">ACTUALIZAR LAS CARRERAS</h1>
    </div>
    
<div class="container m-7 bg-dark text-white">
    <form method="post" class="m-5 mx-auto"> 
        <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Nombre de la Carrera:</label>
                    <input type="text" class="form-control" name="nombre_carrera" placeholder="Ingrese el nombre de la carrera">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-3">
                <label>Escuelas:</label>
<select name="escuelas" id="">
    <option value="all">Seleccione una escuela:</option>
    <?php
    $carreras = $carreras_controller->listarescuelas();
    foreach ($carreras as $item) {
        echo "<option value='" . $item->getIdescuelas() . "'>" . $item->getNombre() . "</option>";
    }
    ?>
</select>
                </div>
            </div>
        <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Asignaturas:</label>
                    <input type="number" class="form-control" name="asignaturas" placeholder="">
                </div>
            </div>
            <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Agregar</button>
</div>

    </form>
</div> 
</div>