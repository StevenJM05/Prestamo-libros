<?php
$carreras_controller = new carreras_controller();

if(isset($_POST['ok1'])){
    
    $carreras = new carreras("", "", $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->agregar($idcarrera, $idescuela, $nom_carrera, $aginaturas);
}
?>
<body style="background-color: #f0f0f0;">
<head>
    <!-- Otros elementos de la cabeza -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>


<div class="container mt-5 text-center">
        <h1 class="fw-bold">INFORMACIÓN DE CARRERAS</h1>
    </div>

    <div class="container mt-5 position-relative" style="margin-left: 210px; margin-top: -15px;">
    <a class='btn btn-success position-absolute top-0 start-0' href='addcarreras'>Agregar Carreras</a>
</div>

</div>
<br><br>

<form method=post >
<table class="table table-dark mx-auto" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Carreras</th>
                <th scope="col">Nombre de la Escuela</th>
                <th scope="col">Nombre de la carrera</th>
                <th scope="col"># Asignaturas</th>
                <th>Act</th>
            </tr>
        </thead>
        <tbody>

        <?php 
        foreach ($carreras_controller->listar() as $aggal) {

            echo "
                        <tr  >
                            <td  > <input type='checkbox'  name='eliminar[]' value=' ' title=' ' > </td>
                            <td>" . $aggal->getIdcarrera() . "</td>
                            <td>" . $aggal->getIdescuelas() . "</td>
                            <td>" . $aggal->getNombrecarrera() . "</td>
                            <td>" . $aggal->getAsignaturas() . "</td>
                            <td><a href='up_carreras/" .  $aggal->getIdcarrera()  . "'><i class='fas fa-edit'></i> Actualizar</a></td>s
                        </tr>
                        ";
    

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