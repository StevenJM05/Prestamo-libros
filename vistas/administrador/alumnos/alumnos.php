<?php 
    $alumnos_controller = new alumnos_controller();
    if(isset($_POST["eliminar"])){
        $id = $_POST["id"];
        $alumnos_controller->eliminar($id);
    }
?>
<div class="container mt-5" style="margin-left: 100px;">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5>Lista de Alumnos</h5>
           
        </div>
        <div class="card-body">

                <table
                    class="table">
                       <thead class="table">
                        <tr>
                            <th>ID</th>
                           
                            <th>Carrera</th>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th colspan="2"><center>Acciones</center></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                       <?php 
                       foreach($alumnos_controller->listar() as $item){
                        echo "<tr>";
                        echo "<td> {$item['id_alumno']} </td>";
                        
                        echo "<td> {$item['nombre_carrera']} </td>";
                        echo "<td> {$item['nombres']} </td>";
                        echo "<td> {$item['apellidos']} </td>";
                        echo "<td> {$item['direccion']} </td>";
                        echo "<td> {$item['telefono']} </td>";
                        echo "<td><form method=post><input type='hidden' value={$item['id_alumno']} name='id'><button name='eliminar' class='btn btn-outline-dark'>Eliminar</button></form></td>";
                        echo "<td><a href='updateAlumno/{$item['id_alumno']}'><button class='btn btn-success'>Actualizar</button></a></td>";
                        echo "</tr>";
                        
                       }
                       ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>

                <table class="bg-dark text-white">
                <a href="addalumnos"><button class="btn btn-outline-dark m-2" >Agregar</button></a>
            
            </table>
            </div>
            
        </div>
    </div>
</div>