<?php
require_once($prestamos);
class PrestamosController extends Conexion
{
    public function agregar($prestamos) {
        $sql = "INSERT INTO prestamos (id_alumno, id_libros, fecha_prestamo, fecha_devolucion, estado) 
                VALUES ('{$prestamos->getIdAlumno()}', '{$prestamos->getIdLibros()}', '{$prestamos->getFechaPrestamo()}', '{$prestamos->getFechaDevolucion()}', {$prestamos->getEstado()})";
        $rs = $this->ejecutarSQL($sql);
    }
    

    public function listar()
    {
        $sql = "SELECT * FROM prestamos";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = new Prestamos($fila["id_prestamos"], $fila["id_alumno"], $fila["id_libros"], $fila["fecha_prestamo"], $fila["fecha_devolucion"], $fila["estado"]);
        }
        return $resultado;
    }

    public function update($prestamos, $id) {
        $sql = "UPDATE prestamos
                SET
                id_alumno = '{$prestamos->getIdAlumno()}',
                id_libros = '{$prestamos->getIdLibros()}',
                fecha_prestamo = '{$prestamos->getFechaPrestamo()}',
                fecha_devolucion = '{$prestamos->getFechaDevolucion()}',
                estado = {$prestamos->getEstado()}
                WHERE id_prestamos = $id";
        $rs = $this->ejecutarSQL($sql);
    }

    public function delete($id){
        $sql = "DELETE FROM prestamos WHERE id_prestamos = $id";
        $rs = $this->ejecutarSQL($sql);
    }
    
}

?>