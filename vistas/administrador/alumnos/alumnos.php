<?php 
    $alumnos_controller = new alumnos_controller();
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Lista de Alumnos</h1>
            <a href="addalumnos"><button class="btn btn-outline-warning" >Agregar</button></a>
        </div>
        <div class="card-body">
            <div
                class="table-responsive-md"
            >
                <table
                    class="table table-striped table-hover table-borderless table-primary align-middle"
                >
                    <thead class="table-light">
                        <caption>
                            Alumnos
                        </caption>
                        <tr>
                            <th>ID</th>
                            <th>Carrera</th>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                       <?php 
                       foreach($alumnos_controller->listar() as $item){
                        echo "<tr>";
                        echo "<td> {$item->getIdalumno()} </td>";
                        echo "<td> {$item->getIdcarrera()} </td>";
                        echo "<td> {$item->getNombres()} </td>";
                        echo "<td> {$item->getApellidos()} </td>";
                        echo "<td> {$item->getDireccion()} </td>";
                        echo "<td> {$item->getTelefono()} </td>";
                        echo "</tr>";
                       }
                       ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
</div>