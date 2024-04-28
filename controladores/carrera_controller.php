<?php 
require_once("conexion.php");
class CarreraController extends Conexion{
    public function agregar($carreras) {
        $sql = "INSERT INTO carreras (id_escuelas, nombre_carrera, asignaturas) 
                VALUES ('{$carreras->getIdEscuelas()}', '{$carreras->getNombreCarrera()}', '{$carreras->getAsignaturas()}')";
        $rs = $this->ejecutarSQL($sql);
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
                id_escuelas = {$carreras->getIdEscuelas()},
                nombre_carrera = '{$carreras->getNombreCarrera()}',
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