<?php
if (!defined("URL")) define("URL","http://localhost/Prestamo-libros/");


require_once("controladores/contenido.php");

require_once("controladores/alumnos_controller.php");
require_once("modelos/alumnos.php");

require_once("controladores/carreras_controller.php");
require_once("modelos/carreras.php");

require_once("controladores/escuelas_controller.php");
require_once("modelos/escuelas.php");

require_once("controladores/libros_controller.php");
require_once("modelos/libros.php");

require_once("controladores/prestamos_controller.php");
require_once("modelos/prestamos.php");
 
require_once("vistas/administrador/index.php");



?>
