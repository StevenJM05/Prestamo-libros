<?php class Libros {
    private $id_libros;
    private $titulo;
    private $autor;
    private $editorial;
    private $fecha_edicion;
    private $ISBN;

    public function __construct($id_libros= "", $titulo = "", $autor="", $editorial="", $fecha_edicion="", $ISBN="") {
        $this->id_libros = $id_libros;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->fecha_edicion = $fecha_edicion;
        $this->ISBN = $ISBN;
    }

    public function getIdLibros() {
        return $this->id_libros;
    }

    public function setIdLibros($id_libros) {
        $this->id_libros = $id_libros;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function getFechaEdicion() {
        return $this->fecha_edicion;
    }

    public function setFechaEdicion($fecha_edicion) {
        $this->fecha_edicion = $fecha_edicion;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }
}
?>