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
        $sql = "SELECT 
        p.id_prestamos, 
        CONCAT(a.nombres, ' ', a.apellidos) AS nombre_alumno, 
        l.titulo AS titulo_libro, 
        p.fecha_prestamo, 
        p.fecha_devolucion, 
        p.estado
    FROM 
        prestamos p
    JOIN 
        alumnos a ON p.id_alumno = a.id_alumno
    JOIN
        libros l ON p.id_libros = l.id_libros";

    $rs = $this->ejecutarSQL($sql);
    $resultado = array();

      while ($fila = $rs->fetch_assoc()) {
    $prestamo = new Prestamos();
    $prestamo->setIdPrestamos($fila["id_prestamos"]);
    $prestamo->setIdAlumno($fila["nombre_alumno"]); 
    $prestamo->setIdLibros($fila["titulo_libro"]);  
    $prestamo->setFechaPrestamo($fila["fecha_prestamo"]);
    $prestamo->setFechaDevolucion($fila["fecha_devolucion"]);
    $prestamo->setEstado($fila["estado"]);
    $resultado[] = $prestamo;
     }

       return $resultado;

    }

    public function obtenerPrestamoPorId($idPrestamo) {
        $sql = "SELECT * FROM prestamos WHERE id_prestamos = $idPrestamo";
        $resultado = $this->ejecutarSQL($sql);
        if ($resultado->num_rows > 0) {
            $prestamo = $resultado->fetch_assoc();
            return $prestamo;
        } else {
            return null;
        }
    }
    public function actualizar($prestamo, $id){
        $sql = "UPDATE prestamos
                SET id_alumno = '{$prestamo->getIdAlumno()}',
                id_libros = '{$prestamo->getIdLibros()}',
                fecha_prestamo = '{$prestamo->getFechaPrestamo()}',
                fecha_devolucion = '{$prestamo->getFechaDevolucion()}',
                estado = '{$prestamo->getEstado()}'
                WHERE id_prestamos = {$id}";
        $this->ejecutarSQL($sql);
    }
    
    public function historial($id_alumno){
        if ($id_alumno) {
          
            $sql = "SELECT 
                        p.id_prestamos, 
                        CONCAT(a.nombres, ' ', a.apellidos) AS nombre_alumno, 
                        l.titulo AS titulo_libro, 
                        p.fecha_prestamo, 
                        p.fecha_devolucion, 
                        p.estado
                    FROM 
                        prestamos p
                    JOIN 
                        alumnos a ON p.id_alumno = a.id_alumno
                    JOIN
                        libros l ON p.id_libros = l.id_libros
                    WHERE 
                        p.id_alumno = $id_alumno";
        }
    
        
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
    
       
        while ($fila = $rs->fetch_assoc()) {
            $prestamo = new Prestamos();
            $prestamo->setIdPrestamos($fila["id_prestamos"]);
            $prestamo->setIdAlumno($fila["nombre_alumno"]); 
            $prestamo->setIdLibros($fila["titulo_libro"]);  
            $prestamo->setFechaPrestamo($fila["fecha_prestamo"]);
            $prestamo->setFechaDevolucion($fila["fecha_devolucion"]);
            $prestamo->setEstado($fila["estado"]);
            $resultado[] = $prestamo;
        }
    
       
        return $resultado;
    }
    
}    

    


?>