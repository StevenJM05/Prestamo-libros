<?php
require_once("conexion.php");

class PrestamosController extends Conexion
{

    public function agregar($prestamo) {
        $sql = "INSERT INTO prestamos (id_alumno, id_libros, fecha_prestamo, fecha_devolucion, estado)  
                VALUES ('" . $prestamo->getIdAlumno() . "', '" . $prestamo->getIdLibros() . "', '" . 
                $prestamo->getFechaPrestamo() . "', '" . $prestamo->getFechaDevolucion() . "', '" . 
                $prestamo->getEstado() . "')";
        $this->ejecutarSQL($sql);
    }
    
    public function listar()
    {
        $sql = "SELECT p.id_prestamos, a.nombres AS nombre_alumno, l.titulo AS titulo_libro, p.fecha_prestamo, p.fecha_devolucion, p.estado
                FROM prestamos p
                JOIN alumnos a ON p.id_alumno = a.id_alumno
                JOIN libros l ON p.id_libros = l.id_libros";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $prestamo = new Prestamos();
            $prestamo->setIdPrestamos($fila["id_prestamos"]);
            $prestamo->setIdAlumno($fila["nombre_alumno"]); // Usamos el nombre del alumno en lugar del ID
            $prestamo->setIdLibros($fila["titulo_libro"]); // Usamos el título del libro en lugar del ID
            $prestamo->setFechaPrestamo($fila["fecha_prestamo"]);
            $prestamo->setFechaDevolucion($fila["fecha_devolucion"]);
            $prestamo->setEstado($fila["estado"]);
            $resultado[] = $prestamo;
        }
        return $resultado;
    }

    
}

?>