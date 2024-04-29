<?php
require_once("conexion.php");

class alumnos_controller extends Conexion{
    public function agregar($idcarre,$nom,$ape,$dir,$tel){
        $sql="INSERT INTO alumnos (id_carrera, nombres, apellidos, direccion, telefono) VALUES ('".$idcarre."','".$nom."','".$ape."','".$dir."','".$tel."')";
        $rs = $this -> ejecutarSQL($sql);
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

    /*public function eliminar(){
        $idal="";
        $sql = "DELETE FROM alumnos WHERE id_alumno=$idal";
        $rs= $this -> ejecutarSQL($sql);
        $resultado=array();
        while($fila=$rs->fetch_assoc()){
         $resultado[]=new Alumnos ($fila["id_alumno"],$fila["id_carrera"],$fila["nombres"],$fila["apellidos"],$fila["direccion"],$fila["telefono"]);
        }
        return $resultado;
    }*/
}

?>