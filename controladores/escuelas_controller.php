<?php 
require_once("conexion.php");
class escuelas_controller extends Conexion{
    public function agregar($escuelas) {
        $sql = "INSERT INTO escuelas (nombre, director) 
                VALUES ('{$escuelas->getNombre()}', '{$escuelas->getDirector()}')";
        $rs = $this->ejecutarSQL($sql);
    }

    public function listar(){
        $sql = "SELECT * FROM escuelas";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while($fila = $rs->fetch_assoc()){
            $resultado[] = new Escuelas($fila["id_escuelas"], $fila["nombre"], $fila["director"]);
        }
        return $resultado;
    }

    public function update($escuelas, $id) {
        $sql = "UPDATE escuelas
                SET
                nombre = '{$escuelas->getNombre()}',
                director = '{$escuelas->getDirector()}'
                WHERE id_escuelas = $id";
        $rs = $this->ejecutarSQL($sql);
    }

    public function delete($id){
        $sql = "DELETE FROM escuelas WHERE id_escuelas = $id";
        $rs = $this->ejecutarSQL($sql);
    }
}
?>