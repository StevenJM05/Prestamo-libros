<?php
$alumnos_controller  = new alumnos_controller();
$LibrosController = new LibrosController();
$prestamosController = new PrestamosController();
if (isset($_POST['ok1'])) {
    $prestamo = new Prestamos("", $_POST['id_alumno'], $_POST['id_libros'], $_POST['fecha_prestamo'], $_POST['fecha_devolucion'], 1);
    $prestamosController->agregar($prestamo);
}
?>
<form method="post">
    <div class="container mt-5" style="margin-left: 100px;">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title mb-0">Agregar Nuevo Préstamo</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <!--busqueda-->
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="busquedaAlumnos" class="col-sm-4 col-form-label">Buscar Alumno:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="busquedaAlumnos" name="busquedaAlumnos" placeholder="Ingrese el nombre del alumno">
                            <button type="submit" name="buscar" class="btn btn-primary mt-2">Buscar</button>
                        </div>
                    </div>
                    <?php if (isset($_POST['buscar'])) : ?>
                        <!-- Resultados de búsqueda -->
                        <div class="mb-3 row" style="display: flex; align-items: center;" id="resultadosAlumnos">
                            <label for="id_alumno" class="col-sm-4 col-form-label">Resultados:</label>
                            <div class="col-sm-8">
                                <ul class="list-group">
                                    <?php foreach ($alumnos_controller->buscarAlumnos($_POST['busquedaAlumnos']) as $alumno) : ?>
                                        <li class="list-group-item mt-2">
                                            <?php echo $alumno->getNombres() . ' ' . $alumno->getApellidos(); ?>
                                            <button 
                                                type="button"
                                                class="btn btn-primary btn-sm"
                                                onclick="seleccionarAlumno(
                                                    <?php echo $alumno->getIdalumno(); ?>,
                                                    '<?php echo $alumno->getNombres(); ?>',
                                                    '<?php echo $alumno->getApellidos(); ?>'
                                                )">
                                            >
                                                Seleccionar
                                            </button>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php  endif; ?>

                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="alumno" class="col-sm-4 col-form-label">Alumno Seleccionado: </label>
                        <div class="col-sm-8">
                            <input disabled id="nombreAlumno" type="text" class="form-control">
                            <input type="hidden"id="idAlumno" name="id_alumno">
                        </div>
                    </div>
                 
                    <!--Libros-->
                    <div class="mb-3 row" style="display: felx; align-items: center;">
                        <label for="inputLibro" class="col-sm-4 col-form-label">Seleccione el Libro:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="busquedaLibros" name="busquedaLibros" placeholder="Ingrese el título del libro">
                            <button type="submit" name="buscar_libro" class="btn btn-primary mt-2">Buscar</button>
                        </div>
                    </div>
                    <?php if (isset($_POST['buscar_libro'])) : ?>
                        <!-- Resultados de búsqueda -->
                        <div class="mb-3 row" style="display: flex; align-items: center;" id="resultadosLibros">
                            <label for="id_libro" class="col-sm-4 col-form-label">Resultados:</label>
                            <div class="col-sm-8">
                                <ul class="list-group">
                                    <?php foreach ($LibrosController->buscarLibros($_POST['busquedaLibros']) as $libros) : ?>
                                        <li class="list-group-item mt-2">
                                            <?php echo $libros->getTitulo(); ?>
                                            <button 
                                                type="button"
                                                class="btn btn-primary btn-sm" 
                                                onclick="seleccionarLibro(<?php echo $libros->getIdLibros(); ?>, '<?php echo $libros->getTitulo(); ?>')">
                                                    Seleccionar
                                            </button>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>


                    <!-- Campo de libro seleccionado -->
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="libroSeleccionado" class="col-sm-4 col-form-label">Libro Seleccionado:</label>
                        <div class="col-sm-8">
                            <input disabled type="text" id="nombreLibro" class="form-control">
                            <input type="hidden" name="id_libros" id="idLibro">
                        </div>
                    </div>

                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="inputFechaPrestamo" class="col-sm-4 col-form-label">Fecha de Préstamo</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha_prestamo" id="inputFechaPrestamo">
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <label for="inputFechaDevolucion" class="col-sm-4 col-form-label">Fecha de Devolución</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha_devolucion" id="inputFechaDevolucion">
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: flex; align-items: center;">
                        <div class="offset-sm-4 col-sm-8">
                            <button id="btnGuardar" name="ok1" class="btn btn-dark">Agregar</button>
                            <a href="prestamos" class="btn btn-success text-white">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>

<script>
window.onload = (event) => {
    validarGuardados()

    document.getElementById("btnGuardar").addEventListener("click", function(event){
      localStorage.removeItem('alumnoSeleccionado')
      localStorage.removeItem('libroSeleccionado')
    });
};


function validarGuardados() {
    let alumnoSeleccionado = localStorage.getItem('alumnoSeleccionado')
    let libroSeleccionado = localStorage.getItem('libroSeleccionado')

    if (alumnoSeleccionado) {
        alumnoSeleccionado = JSON.parse(alumnoSeleccionado)

        document.getElementById('nombreAlumno').value = alumnoSeleccionado.nombreAlumno
        document.getElementById('idAlumno').value = alumnoSeleccionado.idAlumno
    }

    if (libroSeleccionado) {
        libroSeleccionado = JSON.parse(libroSeleccionado)

        document.getElementById('nombreLibro').value = libroSeleccionado.nombreLibro
        document.getElementById('idLibro').value = libroSeleccionado.idLibro
    }
}

function seleccionarLibro(idLibro, nombrelibro) {
    const resultados = document.getElementById('resultadosLibros')
    if(resultados){
        resultados.innerHTML = '';
        const inputIdLibro = document.getElementById('idLibro')
        inputIdLibro.value = idLibro;
        const inputNombreLibro = document.getElementById('nombreLibro')
        inputNombreLibro.value = nombrelibro;

        localStorage.setItem('libroSeleccionado', JSON.stringify({
            idLibro: idLibro,
            nombreLibro: nombrelibro
        }))
    }
}

function seleccionarAlumno(idAlumno, nombreAlumno, apellidosAlumno) {
    
    const resultados = document.getElementById('resultadosAlumnos')

    if (resultados) {
        resultados.innerHTML = ''
        const inputIdAlumno = document.getElementById('idAlumno')
        inputIdAlumno.value = idAlumno
        const inputNombreAlumno = document.getElementById('nombreAlumno')
        inputNombreAlumno.value = `${nombreAlumno} ${apellidosAlumno}`

        localStorage.setItem('alumnoSeleccionado', JSON.stringify({
            idAlumno: idAlumno,
            nombreAlumno: `${nombreAlumno} ${apellidosAlumno}`,
        }))
    }

}
</script>
