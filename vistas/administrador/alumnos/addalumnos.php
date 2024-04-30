<?php
$alumnos_controller = new alumnos_controller();
if(isset($_POST['ok1'])){

    $alumnos = new alumnos($_POST['id_carrera'], $_POST['nombres'], $_POST['apellidos'], $_POST['direccion'], $_POST['telefono']);
    $alumnos_controller->agregar($alumnos);
}
?>


<div class="container mt-5 text-center">
        <h1 class="fw-bold">AGREGAR ALUMNOS</h1>
    </div>
    <div class="container m-6 bg-dark text-white">
    <form method="post" class="m-5 mx-auto"> 
        <div class="col-md-4">
            <div class="form-group mt-3">
                    <label>Nombres del Alumno:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingrese nombres del alumno">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Apellidos del Alumno:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos del alumno">
                </div>
            </div>
            <div class="col-md-4">
    <div class="form-group mt-3">
        <label>Seleccione la carrera:</label>
        <select class="form-control" name="id_carrera">
            <?php
            $carreras = $carrera->listarCarreras();
            foreach ($carreras as $carrera) {
                echo "<option value='" . $carrera['id'] . "'>" . $carrera['nombre'] . "</option>";
            }
            ?>
        </select>
    </div>
</div>
       
        <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Dirección del Alumno:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Ingrese la direccion del alumno">
                </div>
            </div>
        <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Teléfono del Alumno:</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Ingrese telefono del alumno">
                </div>
            </div>
            <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-primary m-4 mt-3" name="ok1">Agregar</button>
</div>

    </form>
</div> 
</div>

