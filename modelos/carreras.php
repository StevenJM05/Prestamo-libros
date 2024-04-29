<?php class Carreras {
    private $id_carrera;
    private $id_escuelas;
    private $nombre_carrera;
    private $asignaturas;

    public function __construct($id_carrera= "", $id_escuelas = "", $nombre_carrera = "", $asignaturas = "") {
        $this->id_carrera = $id_carrera;
        $this->id_escuelas = $id_escuelas;
        $this->nombre_carrera = $nombre_carrera;
        $this->asignaturas = $asignaturas;
    }
//prueba
    public function getIdCarrera() {
        return $this->id_carrera;
    }

    public function setIdCarrera($id_carrera) {
        $this->id_carrera = $id_carrera;
    }

    public function getIdEscuelas() {
        return $this->id_escuelas;
    }

    public function setIdEscuelas($id_escuelas) {
        $this->id_escuelas = $id_escuelas;
    }

    public function getNombreCarrera() {
        return $this->nombre_carrera;
    }

    public function setNombreCarrera($nombre_carrera) {
        $this->nombre_carrera = $nombre_carrera;
    }

    public function getAsignaturas() {
        return $this->asignaturas;
    }

    public function setAsignaturas($asignaturas) {
        $this->asignaturas = $asignaturas;
    }
}
?>