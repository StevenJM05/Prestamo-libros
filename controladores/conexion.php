<?php
date_default_timezone_set('America/El_Salvador');


if (!defined('SERVIDOR')) define('SERVIDOR', 'localhost');
if (!defined('USUARIO')) define('USUARIO', 'root');
if (!defined('CLAVE')) define('CLAVE', '');
<<<<<<< HEAD
if (!defined('DATABASE')) define('DATABASE', 'EXAMENPHP2');
=======
if (!defined('DATABASE')) define('DATABASE', 'EXAMEN2PHP');

>>>>>>> ae6aa2954689ee2f0f116bdc00051533a7807971



class conexion
{
    private $connect;
    public function __construct()
    {
        try 
        {
            $this -> connect= new mysqli(SERVIDOR, USUARIO, CLAVE, DATABASE);
        }
        catch(Exception $e)
        {
           echo $e;
        }
    }

    public function cn(){
    	return $this->connect;
    }

    public function ejecutarSQL($sql){
        return $this->cn()->query($sql);
    }

}

