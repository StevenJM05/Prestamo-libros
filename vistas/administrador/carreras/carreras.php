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
<body>
<div class="container mt-5 text-center">
        <h1 class="fw-bold"s>LISTAR CARRERAS</h1>
    </div>

 

                            echo "
                        <tr  >
                            <td  > <input type='checkbox'  name='eliminar[]' value='" . $aggal->getIdcarrera() . "' title=' ' > </td>
                            <td>" . $aggal->getIdcarrera() . "</td>
                            <td>" . $aggal->getIdescuelas() . "</td>
                            <td>" . $aggal->getNombrecarrera() . "</td>
                            <td>" . $aggal->getAsignaturas() . "</td>
                            <td><a href='up_carreras/" .  $aggal->getIdcarrera()  . " '>Click para actualizar </a></td>
                        </tr>
                        ";
                        }

           } 
            
            ?>

            
            <tr>
                <td colspan=13>
                    
                    <input class='btn btn-danger' type="submit" value="Eliminar" name=del >
                    
                </td>
            </tr>
        </tbody>
    </table>
       <div class="container mt-6 position-relative" style="margin-right: 50px">
    <a class='btn btn-primary position-absolute top-0 start-0' href='addcarreras'>Agregar Carreras</a>
      </div>
    </form>
</div>


</div>
</div>
</div>