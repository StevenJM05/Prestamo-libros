<?php
$carreras_controller = new carreras_controller();

if(isset($_POST['ok1'])){
    
    $carreras = new carreras("", "", $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->agregar($idcarrera, $idescuela, $nom_carrera, $aginaturas);

}
?>

<?php
 if(isset($_POST['del'])){

    if(isset($_POST['eliminar']) && is_array($_POST['eliminar'])) {
        foreach($_POST['eliminar'] as $idcarreras) {
            $carreras_controller->delete(intval($idcarreras)); 
            
        }
    }

}
?>
<div class="container mt-5" style="margin-left: 100px;">
    
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Información de  carreras</h5>
        </div>

</div>

<div style="background-color: white;">
<div class="card-body">
<form method=post >

<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Carreras</th>
                <th scope="col">Nombre de la Escuela</th>
                <th scope="col">Nombre de la carrera</th>
                <th scope="col"># Asignaturas</th>
                <th scope="col">Actualizar</th>
            </tr>
        </thead>
        <tbody>

        <?php 
        foreach ($carreras_controller->listar() as $aggal) {

            echo "
                        <tr  >
                            <td  > <input type='checkbox'  name='eliminar[]' value='".$aggal->getIdcarrera()."' title=' ' > </td>
                            <td>" . $aggal->getIdcarrera() . "</td>
                            <td>" . $aggal->getIdescuelas() . "</td>
                            <td>" . $aggal->getNombrecarrera() . "</td>
                            <td>" . $aggal->getAsignaturas() . "</td>
                            <td><a href='up_carreras/" .  $aggal->getIdcarrera()  . " ' class='btn btn-success'>Actualizar </a></td>
                        </tr>
                        ";
    

           } 
            
            ?>

        </tbody>
        
      </table>
     
      <a class='btn btn-outline-dark m-2' href='addcarreras'>Agregar Carreras</a>
      <input class='btn btn-outline-dark' type="submit" value="Eliminar" name=del >
    </div>
    </form>
   
</div>
</div>
</div>
        </div>