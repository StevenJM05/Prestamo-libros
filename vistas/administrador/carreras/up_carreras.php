<?php

$carreras_controller = new carreras_controller();
$info = explode("/",$_GET["url"]);
$id = $info[1];

$carrera_actual = $carreras_controller->getCarreraPorId($id);

if(isset($_POST["ok1"])){
    $carreras = new carreras($id, $_POST['id_escuelas'], $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->update($carreras, $id);
    header("Location: http://localhost/Prestamo-libros/carreras");
    exit();
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
                <input type="text" class="form-control" name="nombre_carrera" placeholder="Ingrese el nombre de la carrera" value="<?php echo $carrera_actual->getNombreCarrera(); ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mt-3">
                <label>Escuelas:</label>
                <select class="form-control" name="id_escuelas">
                    <option value="all">Seleccione una escuela:</option>
                    <?php
                    $escuelas = $carreras_controller->listarescuelas();
                    foreach ($escuelas as $escuela) {
                        $selected = ($escuela->getIdEscuelas() == $carrera_actual->getIdEscuelas()) ? "selected" : "";
                        echo "<option value='" . $escuela->getIdEscuelas() . "' $selected>" . $escuela->getNombre() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mt-3">
                <label>Asignaturas:</label>
                <input type="number" class="form-control" name="asignaturas" placeholder="" value="<?php echo $carrera_actual->getAsignaturas(); ?>">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Actualizar</button>
            <a href="carreras" class="btn btn-outline-primary m-4 mt-3">Regresar</a>
        </div>
    </form>
</div>
