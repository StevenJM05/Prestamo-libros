<?php
date_default_timezone_set('America/El_Salvador');

<<<<<<< HEAD
    if (!defined('SERVIDOR')) define('SERVIDOR', 'localhost');
    if (!defined('USUARIO')) define('USUARIO', 'root');
    if (!defined('CLAVE')) define('CLAVE', '');
    if (!defined('DATABASE')) define('DATABASE', 'EXAMEN2PHP');
=======
if (!defined('SERVIDOR')) define('SERVIDOR', 'localhost');
if (!defined('USUARIO')) define('USUARIO', 'root');
if (!defined('CLAVE')) define('CLAVE', '');
if (!defined('DATABASE')) define('DATABASE', 'EXAMEN2PHP');
>>>>>>> 9571dbe13f8dfef47ba7f89257bf0879f56eb0da


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

