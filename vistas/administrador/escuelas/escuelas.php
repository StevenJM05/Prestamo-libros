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
<body style="background-color: #f0f0f0;">
<head>
    <!-- Otros elementos de la cabeza -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

  

<div class="container mt-5 text-center">
        <h1 class="fw-bold">INFORMACIÓN DE ESCUELAS</h1>
    </div>

    <div class="container mt-5 position-relative" style="margin-left: 210px; margin-top: -15px;">
    <a class='btn btn-success position-absolute top-0 start-0' href='addescuelas'>Agregar Escuelas</a>
</div>

</div>
<br><br>

<form method=post>
<table class="table table-dark mx-auto" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Escuelas</th>
                <th scope="col">Nombre de la escuela</th>
                <th scope="col">Director</th>
                <th>Actualizar</th>
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
                            <td><a href='up_escuelas/" . $aggal->getIdescuelas()  . "'><i class='fas fa-edit'></i> Actualizar</a></td>

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

            
            <tr>
                <td colspan=13>
                    
                    <input class='btn btn-danger' type="submit" value="Eliminar" name=del >
                    
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>


</div>
</div>