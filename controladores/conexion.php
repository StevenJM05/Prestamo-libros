<?php 
    date_default_timezone_set('America/El_Salvador');

    if (!defined('SERVIDOR')) define('SERVIDOR', 'localhost');
    if (!defined('USUARIO')) define('USUARIO', 'root');
    if (!defined('CLAVE')) define('CLAVE', '');
    if (!defined('DATABASE')) define('DATABASE', 'EXAMEN2PHP');

class Conexion {
    private $connect;
    public function __construct() {
        try{
            $this->connect = new mysqli(SERVIDOR, USUARIO, CLAVE, DATABASE);
        }catch(Exception $e){
            
        }
    }

    public function cn(){
        return $this->connect;
    }

    public function ejecutarSQL($sql) {
        $resultado = $this->cn()->query($sql);
        return $resultado;
    }


}
?>