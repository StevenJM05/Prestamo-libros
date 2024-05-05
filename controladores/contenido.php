<?php
class Contenido{
    
    public function mostra_archivo(){
        require_once("conexion.php"); 
        $prestamo = new prestamos();
        

        $url=isset($_GET["url"])? $_GET["url"]:null;
        $url=explode("/",$url);
        $pagina="";
        if($url[0]==null){
            $pagina="vistas/inicio.php";}
            elseif($url[0]=="alumnos"){
                $pagina="vistas/administrador/alumnos/alumnos.php";
            }
            elseif($url[0]=="updateAlumno"){
                $pagina="vistas/administrador/alumnos/updateAlumno.php";
            }
            elseif($url[0]=="addalumno"){
                $pagina="vistas/administrador/alumnos/addalumno.php";
            }
            elseif($url[0]=="carreras"){
                $pagina="vistas/administrador/carreras/carreras.php";
            }
            elseif($url[0]=="addcarreras"){
                $pagina="vistas/administrador/carreras/addcarreras.php";
            }
            elseif($url[0]=="up_carreras"){
                $pagina="vistas/administrador/carreras/up_carreras.php";
            }
            elseif($url[0]=="escuelas"){
                $pagina= "vistas/administrador/escuelas/escuelas.php";
            }
            elseif($url[0]=="addescuelas"){
                $pagina= "vistas/administrador/escuelas/addescuelas.php";
            }
            elseif($url[0]=="up_escuelas"){
                $pagina= "vistas/administrador/escuelas/up_escuelas.php";
            }
            elseif($url[0]=="libros"){
                $pagina= "vistas/administrador/libros/libros.php";
            }
            elseif($url[0]=="addprestamo"){
                $pagina=  "vistas/administrador/prestamos/addprestamo.php";
            }     
            elseif($url[0]=="prestamos"){
                $pagina=  "vistas/administrador/prestamos/prestamos.php";
            }          
            elseif($url[0]=="prestamos"){
                $pagina=  "vistas/administrador/prestamos/up_prestamo.php/10";
            }
            else{
                $pagina="vistas/e404.php";
            }

            return $pagina;
        }
    }


?>