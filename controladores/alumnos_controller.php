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
    
    public function listar2(){
        $sql = "SELECT * FROM alumnos";
        $rs= $this -> ejecutarSQL($sql);
        $resultado=array();
        while($fila=$rs->fetch_assoc()){
        
        $resultado[]=new Alumnos ($fila["id_alumno"],$fila["id_carrera"],$fila["nombres"],$fila["apellidos"],$fila["direccion"],$fila["telefono"]);
     
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

    public function update($alumnos, $id){
        $sql = "UPDATE alumnos
                SET id_carrera = '{$alumnos->getIdCarrera()}',
                nombres = '{$alumnos->getNombres()}',
                apellidos = '{$alumnos->getApellidos()}',
                direccion = '{$alumnos->getDireccion()}',
                telefono = '{$alumnos->getTelefono()}'
                WHERE id_alumno = {$id}";
        $this->ejecutarSQL($sql);
    }

    public function eliminar($id){
        $sql = "DELETE FROM alumnos WHERE id_alumno = {$id}";
        $this->ejecutarSQL($sql);
    }
    

    public function obtenerAlumnoPorId($id) {
        $sql = "SELECT * FROM alumnos WHERE id_alumno = $id";
        $resultado = $this->ejecutarSQL($sql);
        if ($resultado->num_rows > 0) {
            // Obtener los datos del alumno como un array asociativo
            $alumno = $resultado->fetch_assoc();
            return $alumno;
        } else {
            return null;
        }
    }

    public function buscarAlumnos($query){
        $sql = "SELECT * FROM alumnos WHERE nombres LIKE '%{$query}%' OR apellidos LIKE '%{$query}%'";
        $resultado = $this->ejecutarSQL($sql);
        $alumnos = array();
        while($fila = $resultado->fetch_assoc()){
            $alumnos[] = new Alumnos($fila["id_alumno"], $fila["id_carrera"], $fila["nombres"], $fila["apellidos"], $fila["direccion"], $fila["telefono"]);
        }
        return $alumnos;
    }
    
}

?>