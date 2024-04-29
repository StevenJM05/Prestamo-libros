
<style>
.navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: #333; 
}

.nav-link {
    font-size: 18px;
    font-weight: bold;
    color: #555; 
}

.nav-link:hover {
    color: #007bff; 
}

.navbar-toggler-icon {
    background-image: url('data:image/svg+xml;...'); 
}

.navbar-toggler {
    border: none;
}

.form-control {
    border-radius: 20px;
}

.btn-outline-success {
    border-radius: 20px;
    border-color: #28a745;
    color: #28a745; 
}

.btn-outline-success:hover {
    background-color: #28a745; 
    color: #fff; 
}
</style>





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
                    <a class="nav-link" href="libros/libros.php">Libros</a>
                </li>
            </ul>
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
