<?php
require_once("conexion.php");

class alumnos_controller extends Conexion{
    public function agregar($alumnos) {
        $sql = "INSERT INTO alumnos (id_carrera, nombres, apellidos, direccion, telefono) 
                VALUES ('{$alumnos->getIdCarrera()}', '{$alumnos->getNombres()}', '{$alumnos->getApellidos()}', '{$alumnos->getDireccion()}', '{$alumnos->getTelefono()}')";
        $rs = $this->ejecutarSQL($sql);
    }
    
    public function listar() {
        $sql = "SELECT a.id_alumno, c.id_carrera, c.nombre_carrera, a.nombres, a.apellidos, a.direccion, a.telefono 
                FROM alumnos a 
                INNER JOIN carreras c ON a.id_carrera = c.id_carrera";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array(); 
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }
    
        return $resultado; 
    }

    public function listarCarreras(){
        $sql = "SELECT * FROM carreras";
        $rs= $this->ejecutarSQL($sql);
        $resultado = array();

        while($fila = $rs->fetch_assoc()){
            $resultado[] = new Carreras($fila["id_carrera"], $fila["id_escuelas"], $fila["nombre_carrera"], $fila["asignaturas"]);
        }
        return $resultado;
    }
}

?>