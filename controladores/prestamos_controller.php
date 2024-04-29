<?php
require_once("conexion.php");

class PrestamosController extends Conexion
{

        public function agregar($prestamo) {
            $sql = "INSERT INTO prestamos (id_alumno, id_libros, fecha_prestamo, fecha_devolucion, estado)  VALUES (('" . $prestamo->getIdAlumno() . $prestamo->getIdLibros() . $prestamo->getFechaPrestamo() . $prestamo->getFechaDevolucion() . $prestamo->getEstado() . "')";
            $this->ejecutarSQL($sql);
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
}

?>