<?php
$escuelas_controller = new escuelas_controller();

if(isset($_POST['del'])){

    if(isset($_POST['eliminar']) && is_array($_POST['eliminar'])) {
        foreach($_POST['eliminar'] as $idescuelas) {
            $escuelas_controller->delete(intval($idescuelas)); 
            
        }
    }

}
?>
<div class="container mt-5">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Información de escuelas</h5>
        </div>

</div>

<div style="background-color: white;">
<div class="card-body">
<form method=post>
<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Escuelas</th>
                <th scope="col">Nombre de la escuela</th>
                <th scope="col">Director</th>
                <th>Act</th>
            </tr>
        </thead>
        <tbody>

        <?php //comentario
        foreach ($escuelas_controller->listar() as $aggal) {

            echo "
                        <tr  >
                            <td  > <input type='checkbox'  name='eliminar[]' value='". $aggal->getIdescuelas() ." ' title='Eliminar ' > </td>
                            <td>" . $aggal->getIdescuelas() . "</td>
                            <td>" . $aggal->getNombre() . "</td>
                            <td>" . $aggal->getDirector() . "</td>
                            <td><a href='up_escuelas/" . $aggal->getIdescuelas()  . "'class='btn btn-success'>Actualizar </a></td>
                        </tr>
                        ";
           /*while ($fila=$rs->fetch_assoc()) {
                echo "
                <tr  >
                    <td  > <input type='checkbox'  name='eliminar[]' value='$fila[id_alumno]' title='$fila[id_alumno]' > </td>
                    <td>$fila[id_alumno]</td>
                    <td>$fila[id_carrera]</td>
                    <td>$fila[nombres]</td>
                    <td>$fila[apellidos]</td>
                    <td>$fila[direccion]</td>
                    <td>$fila[telefono]</td>
                    <td><a href='update/$fila[id_alumno]'>A </a></td>
                </tr>
                ";*/

           } 
            
            ?>

            

        </tbody>
    </table>
    <div class="container">
    <table>
  
    <a class='btn btn-outline-dark m-2' href='addescuelas'>Agregar Escuelas</a>
                    <input class='btn btn-outline-dark' type="submit" value="Eliminar" name=del >
                   
           
    </table>
    </form>
</div>

</div>
</div>
</div>