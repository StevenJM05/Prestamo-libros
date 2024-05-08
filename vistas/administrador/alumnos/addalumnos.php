<?php
$alumnos_controller = new alumnos_controller();


if (isset($_POST['ok1'])) {
    $alumno = new Alumnos("",$_POST['id_carrera'], $_POST['nombres'], $_POST['apellidos'], $_POST['direccion'], $_POST['telefono']);
    $alumnos_controller->agregar($alumno);
}
?>


<div class="container mt-5">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Agregar alumno</h5>
        </div>

    <div class="card-body">
    <form method="post">

    <div class="col-md-4">
                    <label>Nombres del Alumno:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingrese nombres del alumno">
    </div>


                    <div class="col-md-4">
                    <label>Apellidos del Alumno:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos del alumno">
                    </div>

            <div class="col-md-4">
                <div class="form-group mt-4 mx-3">
                    <label>Seleccione la carrera:</label>
                    <select class="form-control" name="id_carrera">
                        <?php
                        foreach ($alumnos_controller->listarCarreras() as $carrera) {
                            echo "<option value='" . $carrera->getIdCarrera() . "'>" . $carrera->getNombreCarrera() . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-4 mx-3">
                    <label>Dirección del Alumno:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion del alumno">
                </div>

            </div>
           
                <div class="form-group mt-4 mx-3">
                    <label>Teléfono del Alumno:</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Ingrese telefono del alumno">
                </div>
            </div>

           

        </div>
                <button type="submit" class="btn btn-outline-dark m-2" name="ok1">Agregar</button>
                <a href="alumnos" class="btn btn-outline-dark">Regresar</a>
            </div>

    </form>
</div>
</div>
</div>