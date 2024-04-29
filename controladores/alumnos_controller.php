<?php
require_once("conexion.php");

class alumnos_controller extends Conexion{
    public function agregar($alumnos) {
        $sql = "INSERT INTO alumnos (id_carrera, nombres, apellidos, direccion, telefono) 
                VALUES ('{$alumnos->getIdCarrera()}', '{$alumnos->getNombres()}', '{$alumnos->getApellidos()}', '{$alumnos->getDireccion()}', '{$alumnos->getTelefono()}')";
        $rs = $this->ejecutarSQL($sql);
    }
    
    public function listar(){
        $sql = "SELECT * FROM alumnos";
        $rs= $this -> ejecutarSQL($sql);
        $resultado=array();
        while($fila=$rs->fetch_assoc()){
         $resultado[]=new Alumnos ($fila["id_alumno"],$fila["id_carrera"],$fila["nombres"],$fila["apellidos"],$fila["direccion"],$fila["telefono"]);
        }
        return $resultado;
    }
}

?>