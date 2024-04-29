<?php 
    class Escuelas {
        private $id_escuelas;
        private $nombre;
        private $director;
    
        public function __construct($id_escuelas = "", $nombre = "", $director = "") {
            $this->id_escuelas = $id_escuelas;
            $this->nombre = $nombre;
            $this->director = $director;
        }
    ///comentario
        public function getIdEscuelas() {
            return $this->id_escuelas;
        }
    
        public function setIdEscuelas($id_escuelas) {
            $this->id_escuelas = $id_escuelas;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function getDirector() {
            return $this->director;
        }
    
        public function setDirector($director) {
            $this->director = $director;
        }
    }
    
?>