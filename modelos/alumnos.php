<?php
class Alumnos{
    private $idalumno;
    private $idcarrera;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $telefono;

    ///contructor
    public function __construct($idalum="",$idcar="",$nom="",$ape="",$dir="",$tel=""){
    $this -> idalumno = $idalum;
    $this -> idcarrera = $idcar;
    $this -> nombres = $nom;
    $this -> apellidos = $ape;
    $this -> direccion = $dir;
    $this -> telefono = $tel;
    }



///getters
    public function getIdalumno(){
        return $this->idalumno;
    }

    public function getIdcarrera(){
        return $this->idcarrera;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }


///setters
public function setIdalumno($idalum){
     $this->idalumno = $idalum;
}

public function setIdcarrera($idcar){
     $this->idcarrera = $idcar;
}

public function setNombres($nom){
     $this->nombres = $nom;
}

public function setApellidos($ape){
     $this->apellidos = $ape;
}

public function setDireccion($dir){
     $this->direccion = $dir;
}

public function setTelefono($tel){
     $this->telefono  = $tel;
}
}


?>