
<style>

/* Estilos para el botón de navegación */
.custom-toggler {
    border-color: #3498db;
}

.custom-toggler .navbar-toggler-icon {
    background-color: #3498db;
}

/* Estilos para los enlaces de navegación */
.navbar-nav .nav-item .nav-link {
    color: #333;
    font-weight: bold;
    text-transform: uppercase; /* Convertir a mayúsculas */
    font-family: 'Roboto', sans-serif; /* Fuente bonita (puedes cambiarla por la que desees) */
}

.navbar-nav .nav-item .nav-link:hover {
    color: #3498db;
}

/* Estilos para el botón de búsqueda */
.btn-outline-success {
    color: #28a745;
    border-color: #28a745;
}

.btn-outline-success:hover {
    background-color: #28a745;
    color: #fff;
}

body, html {
    height: 100%; /* Establecer altura al 100% */
}

body {
    margin: 0; /* Eliminar márgenes predeterminados */
    padding: 0; /* Eliminar relleno predeterminado */
    border: 10px solid #3498db; /* Cambia el color según tu preferencia */
    box-sizing: border-box; /* Hacer que el borde esté incluido en el tamaño total */
}

.container {
    min-height: 100%; /* Ajustar altura mínima al 100% */
}
</style>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">




<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL;?>">Inicio</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="escuelas">Escuelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="alumnos">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carreras">Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prestamos">Prestamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="libros">Libros</a>
                </li>
            </ul>
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
