<?php
$carreras_controller = new carreras_controller();

if (isset($_POST['ok1'])) {

    $carreras = new carreras("", "", $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->agregar($idcarrera, $idescuela, $nom_carrera, $aginaturas);
}
?>

<?php
if (isset($_POST['del'])) {

    if (isset($_POST['eliminar']) && is_array($_POST['eliminar'])) {
        foreach ($_POST['eliminar'] as $idcarreras) {
            $carreras_controller->delete(intval($idcarreras));
        }
    }
}
?>

<div class="container mt-5 position-relative" style="margin-left: 100px;">
    <div class="card">
        <div class="card-header">
            <h1>Carreras</h1>
            <a class='btn btn-success' href='addcarreras'>Agregar</a>
        </div>
        <div class="card-body bg-dark">
            <form method=post>
                <table class="table table-dark mx-auto">
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
                            <td  > <input type='checkbox'  name='eliminar[]' value='" . $aggal->getIdcarrera() . "' title=' ' > </td>
                            <td>" . $aggal->getIdcarrera() . "</td>
                            <td>" . $aggal->getIdescuelas() . "</td>
                            <td>" . $aggal->getNombrecarrera() . "</td>
                            <td>" . $aggal->getAsignaturas() . "</td>
                            <td><a href='up_carreras/" .  $aggal->getIdcarrera()  . " ' class='btn btn-warning'>MODIFICAR </a></td>
                        </tr>
                        ";
                        }

                        ?>


                        <tr>
                            <td colspan=13>

                                <input class='btn btn-danger' type="submit" value="Eliminar" name=del>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>