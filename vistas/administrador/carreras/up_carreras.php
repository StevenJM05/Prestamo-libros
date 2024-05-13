<?php

$carreras_controller = new carreras_controller();
$info = explode("/",$_GET["url"]);
$id = $info[1];

$carrera_actual = $carreras_controller->getCarreraPorId($id);

if(isset($_POST["ok1"])){
    $carreras = new carreras($id, $_POST['id_escuelas'], $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->update($carreras, $id);
}
?>
<div class="container mt-5" style="margin-left: 100px;">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Actualizar carrera</h5>
        </div>

        <div class="card-body">
    <form method="post"> 
       
    <div class="form-group mt-3">
                <label>Nombre de la Carrera:</label>
                <input type="text" class="form-control" name="nombre_carrera" placeholder="Ingrese el nombre de la carrera" value="<?php echo $carrera_actual->getNombreCarrera(); ?>">
    </div>
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
        
       
        <div class="form-group mt-3">
                <label>Asignaturas:</label>
                <input type="number" class="form-control" name="asignaturas" placeholder="" value="<?php echo $carrera_actual->getAsignaturas(); ?>">
                <label for=""><br></label>

                <table>
                 <button type="submit" class="btn btn-outline-dark m-2" name="ok1">Actualizar</button>
            <a href="carreras" class="btn btn-outline-dark">Regresar</a>
                </table>
            </div>
        </div>
       
    </form>
    
</div>

