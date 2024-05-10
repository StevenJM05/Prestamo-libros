<?php
$alumnos_controller = new alumnos_controller();
$info = explode("/", $_GET["url"]);
$id = $info[1];
$alumno_actual = $alumnos_controller->obtenerAlumnoPorId($id);
if (isset($_POST["ok1"])) {
    $alumno = new Alumnos("", $_POST['id_carrera'], $_POST['nombres'], $_POST['apellidos'], $_POST['direccion'], $_POST['telefono']);
    $alumnos_controller->update($alumno, $id);
}

?>

<div class="container mt-5" style="margin-left: 100px;">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Actualizar alumno</h5>
            </div>

        <div class="card-body">

    <form method="post">
      
         
                <div class="form-group mt-4 mx-3">
                    <label>Nombres del Alumno:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingrese nombres del alumno" value="<?php echo $alumno_actual['nombres']; ?>">
                </div>

                <div class="form-group mt-4 mx-3">
                    <label>Apellidos del Alumno:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos del alumno" value="<?php echo $alumno_actual['apellidos']; ?>">
                </div>
            </div>

        
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

        
            <div class="col md-4">
                <div class="form-group mt-4 mx-3">
                    <label>Telefono:</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Ingrese la direccion del alumno" value="<?php echo $alumno_actual['telefono']; ?>">
                <label for=""> </label>
                </div>
            </div>

        </div>
        <table>
            <button type="submit" class="btn btn-outline-dark m-2" name="ok1">Actualizar</button>
            <a href="alumnos" class="btn btn-outline-dark">Regresar</a>
        </table>
      
       
    </form>
</div>