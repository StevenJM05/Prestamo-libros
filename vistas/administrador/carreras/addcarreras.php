<body>
    
<?php
$carreras_controller = new carreras_controller();

if(isset($_POST['ok1'])){
       
    $carreras = new carreras("",$_POST['escuelas'],$_POST['nombre_carrera'], $_POST['asignaturas']);
    $carreras_controller->agregar($carreras);
}
?>

<div class="container mt-5 text-center">      
      <h1 class="fw-bold">AGREGAR CARRERAS</h1>
     </div>

     <div class="container m-6 bg-dark text-white">
    <form method="post" class="m-5 mx-auto">

    <div class=" mt-3 row" style="margin-right: 50px;">

                 <label for="inputName" class="col-6 mr-2 col-form-label">
                 Nombre de la carrera
                 </label>

                 <input
                    type="text"
                    class="form-control"
                    name="nombre_carrera"
                    id="nombre_carrera"
                    placeholder="Ingrese el nombre de la carrera">


    
                 <label for="inputName" class="col-6 col-form-label">
                 Escuelas 
                 </label>
                 <select name="escuelas" id="" class="form-control">
                 <option value="all">Seleccione una escuela:</option>
                 <?php
                 $carreras = $carreras_controller->listarescuelas();
                 foreach ($carreras as $item) {
                 echo "<option value='" . $item->getIdescuelas() . "'>" . $item->getNombre() . "</option>";
                 }?>                    
                </select>
       

                <label for="inputName" class="col-6 mr-2 col-form-label">
                Asignaturas:</label>
                <input type="number" class="form-control" name="asignaturas" placeholder="Cuantas Asignaturas tiene la carrera">
                <label for=""><br></label>
    
        </div>
                </div>


        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-primary m-4 mt-3" name="ok1">Agregar</button>
                <a href="carreras" class="btn btn-success m-4 mt-3">Regresar</a>

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
</body>