<?php

require_once("conexion.php");
class carreras_controller extends Conexion{
    public function agregar($carreras) {
        $sql = "INSERT INTO carreras (id_escuelas, nombre_carrera, asignaturas) 
                VALUES ('{$carreras->getIdescuelas()}', '{$carreras->getNombrecarrera()}', '{$carreras->getAsignaturas()}')";
        $rs = $this->ejecutarSQL($sql);
    }
    
    public function listarescuelas() {
        $sql = "SELECT * FROM escuelas";
        $rs= $this->ejecutarSQL($sql);
        $resultado = array();

        while($fila = $rs->fetch_assoc()){
            $resultado[] = new Escuelas($fila["id_escuelas"], $fila["nombre"], $fila["director"]);
        }

        return $resultado;
    }


    public function listar(){
        $sql = "SELECT * FROM carreras";
        $rs= $this->ejecutarSQL($sql);
        $resultado = array();

        while($fila = $rs->fetch_assoc()){
            $resultado[] = new Carreras($fila["id_carrera"], $fila["id_escuelas"], $fila["nombre_carrera"], $fila["asignaturas"]);
        }

        return $resultado;
    }

    public function update($carreras, $id){
        $sql = "UPDATE carreras
                SET
                id_escuelas = {$carreras->getIdescuelas()},
                nombre_carrera = '{$carreras->getNombrecarrera()}',
                asignaturas = {$carreras->getAsignaturas()}
                WHERE id_carrera = $id";
        $rs = $this->ejecutarSQL($sql);
    }
    
    public function Delete($id){
        $sql = "DELETE FROM carreras WHERE id_carrera = $id";
        $rs = $this->ejecutarSQL($sql);
    }

    
}
?>
<?php
/*require_once("conexion.php");
class carreras_controller extends Conexion{
    public function agregar($idescue,$nom,$asg){
        $sql="INSERT INTO carreras (id_escuelas, nombre_carrera, asignaturas) VALUES ('".$idescue."','".$nom."','".$asg."')";
        $rs = $this -> ejecutarSQL($sql);
    }

    public function listar(){
        $sql = "SELECT * FROM carreras";
        $rs= $this -> ejecutarSQL($sql);
        $resultado=array();
        while($fila=$rs->fetch_assoc()){
         $resultado[]=new Carreras ($fila["id_carrera"],$fila["id_escuelas"],$fila["nombre_carrera"],$fila["asignaturas"]);
        }
        return $resultado;
    }
}*/

?>