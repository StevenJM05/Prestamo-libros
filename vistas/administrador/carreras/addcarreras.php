<?php
$carreras_controller = new carreras_controller();

if(isset($_POST['ok1'])){
       
    $carreras = new carreras("",1, $_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->agregar($carreras);
}
?>
     <div class="container mx-5 mt-5 text-center bg-dark text-white" style="opacity: 1; display: block; border: none; outline: none; width: 100%; padding: 13px 18px; margin: 20px 0 0 0; font-size: 0.8em; border-radius: 100px; background: #3c3c3c; color: #fff;">
        <h1 class="fw-bold">AGREGAR CARRERAS</h1>
     </div>
    


    <div class="container bg-secondary text-white fw-bold" style="opacity: 1; display: block; border: none; outline: none; width: 90%; padding: 13px 18px; margin: 20px 30px 50px 55px; border-radius: 50px;">
        <form method="post" class="m-5 mx-auto">
        <div class="row mt-4">
            <label for="inputName" class="col-4 mr-2 col-form-label">
                Nombre de la escuela
            </label>
            <div class="col-8">
                <input
                    type="text"
                    class="form-control"
                    name="nombre_carrera"
                    id="nombre_carrera"
                    placeholder="Ingrese el nombre de la carrera"
                />
            </div>
            <br>
        </div>

        <div class=" mt-3 row">
            <label for="inputName" class="col-4 col-form-label">
                Escuelas 
            </label>
            <div class="col-8">
                <select name="escuelas" id="">
                    <option value="all">Seleccione una escuela:</option>
                    <?php
   $carreras = $carreras_controller->listarescuelas();
    foreach ($carreras as $item) {
        echo "<option value='" . $item->getIdescuelas() . "'>" . $item->getNombre() . "</option>";
    }
    ?>                    
                </select>
            </div>
        </div>


        </form>
     </div>

<!--<div class="container m-7 bg-da text-whte">
    <form method="post" class="m-5 mx-auto"> 
        <div class="col-md-4">
                <div class="form-group mt-3">
                    <label>Nombre de la Carrera:</label>
                    <input type="text" class="form-control" name="nombre_carrera" placeholder="Ingrese el nombre de la carrera">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-3">
                <label>Escuelas:</label>
<select name="escuelas" id="">
    <option value="all">Seleccione una escuela:</option>
    <?php
   /*$carreras = $carreras_controller->listarescuelas();
    foreach ($carreras as $item) {
        echo "<option value='" . $item->getIdescuelas() . "'>" . $item->getNombre() . "</option>";
    }*/
    ?>
</select>
                </div>
            </div>



        <div class="col-md-8">
                <div class="form-group mt-5">
                    <label>Asignaturas:</label>
                    <input type="number" class="form-control" name="asignaturas" placeholder="Seleccione la asignatura">
                </div>
                
            </div>



            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-outline-primary" name="ok1">Agregar</button>
            </div>

    </form>
</div> 

<?php
/*foreach ($carreras_controller->listar() as $aggal) {

    echo "
                <tr  >
                    <td  > <input type='checkbox'  name='eliminar[]' value=' ' title=' ' > </td>
                    <td>" . $aggal->getIdcarrera() . "</td>
                    <td>" . $aggal->getIdescuelas() . "</td>
                    <td>" . $aggal->getNombrecarrera() . "</td>
                    <td>" . $aggal->getAsignaturas() . "</td>
                    <td><a href='update/ '>A </a></td>
                </tr>
                ";
}*/
?>