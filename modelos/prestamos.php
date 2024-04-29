<?php class Prestamos {
    private $id_prestamos;
    private $id_alumno;
    private $id_libros;
    private $fecha_prestamo;
    private $fecha_devolucion;
    private $estado;

    public function __construct($id_prestamos = "", $id_alumno="", $id_libros="", $fecha_prestamo="", $fecha_devolucion="", $estado="") {
        $this->id_prestamos = $id_prestamos;
        $this->id_alumno = $id_alumno;
        $this->id_libros = $id_libros;
        $this->fecha_prestamo = $fecha_prestamo;
        $this->fecha_devolucion = $fecha_devolucion;
        $this->estado = $estado;
    }

    public function getIdPrestamos() {
        return $this->id_prestamos;
    }

    public function setIdPrestamos($id_prestamos) {
        $this->id_prestamos = $id_prestamos;
    }

    public function getIdAlumno() {
        return $this->id_alumno;
    }

    public function setIdAlumno($id_alumno) {
        $this->id_alumno = $id_alumno;
    }

    public function getIdLibros() {
        return $this->id_libros;
    }

    public function setIdLibros($id_libros) {
        $this->id_libros = $id_libros;
    }

    public function getFechaPrestamo() {
        return $this->fecha_prestamo;
    }

    public function setFechaPrestamo($fecha_prestamo) {
        $this->fecha_prestamo = $fecha_prestamo;
    }

    public function getFechaDevolucion() {
        return $this->fecha_devolucion;
    }

    public function setFechaDevolucion($fecha_devolucion) {
        $this->fecha_devolucion = $fecha_devolucion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}
?>