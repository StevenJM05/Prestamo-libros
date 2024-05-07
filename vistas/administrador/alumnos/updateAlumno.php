<?php
$alumnos_controller = new alumnos_controller();
$info = explode("/",$_GET["url"]);
$id = $info[1];
$alumno_actual = $alumnos_controller->obtenerAlumnoPorId($id); 
if(isset($_POST["ok1"])){
    $alumno = new Alumnos("",$_POST['id_carrera'], $_POST['nombres'], $_POST['apellidos'], $_POST['direccion'], $_POST['telefono']);
    $alumnos_controller->update($alumno,$id);
    header("Location: " . "alumnos");
}

?>

<div class="container mt-5 text-center">
    <h1 class="fw-bold">ACTUALIZAR ALUMNOS</h1>
</div>

<div class="container m-6 bg-dark text-white">
    <form method="post" class="m-5 mx-auto">
        <div class="row"> 
            <div class="col-md-4">
                <div class="form-group mt-4 mx-3">
                    <label>Nombres del Alumno:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingrese nombres del alumno" value="<?php echo $alumno_actual['nombres']; ?>">
                </div>

                <div class="form-group mt-4 mx-3">
                    <label>Apellidos del Alumno:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos del alumno" value="<?php echo $alumno_actual['apellidos']; ?>">
                </div>
            </div>
            <div class="col-md-4">
    <div class="form-group mt-4 mx-3">
        <label>Seleccione la carrera:</label>
        <select class="form-control" name="id_carrera">
            <?php
            foreach ($alumnos_controller->listarCarreras() as $carrera) {
                $selected = ($carrera->getIdCarrera() == $alumno_actual['id_carrera']) ? 'selected' : '';
                echo "<option value='" . $carrera->getIdCarrera() . "' $selected>" . $carrera->getNombreCarrera() . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group mt-4 mx-3">
        <label>Dirección del Alumno:</label>
        <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion del alumno" value="<?php echo $alumno_actual['direccion']; ?>">
    </div>
    <div class="form-group mt-4 mx-3">
        <label>Telefono:</label>
        <input type="text" class="form-control" name="telefono" placeholder="Ingrese la direccion del alumno" value="<?php echo $alumno_actual['telefono']; ?>">
    </div>
</div>

        </div>
        
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Actualizar</button>
            <a href="alumnos" class="btn btn-outline-warning m-4 mt-3">Regresar</a>
        </div>
    </form>
</div>
