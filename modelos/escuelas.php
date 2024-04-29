<?php
class Escuelas{
private $idescuelas;
private $nombre;
private $director;

//constructor
public function __construct($idescue="",$nomb="",$direc=""){
$this -> idescuelas = $idescue;
$this -> nombre = $nomb;
$this -> director = $direc;
}


//getters
public function getIdescuelas(){
return $this -> idescuelas;
}
public function getNombre(){
return $this -> nombre;
}
public function getDirector(){
return $this -> director;
}


//setters
public function setIdescuelas($idescue){
$this -> idescuelas = $idescue;
}
public function setNombre($nomb){
$this -> nombre = $nomb;
}
public function setDirector($direc){
$this -> director = $direc;
}
}
?>