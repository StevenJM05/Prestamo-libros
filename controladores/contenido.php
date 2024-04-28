<?php

class Contenido{
    public function mostra_archivo(){
        $url=isset($_GET["url"])? $_GET["url"]:null;
        $url=explode('/',$url);
        $pagina="";
        if($url[0]==null){
            $pagina="vistas/inicio.php";
        }else if($url[0]=="autor"){
            $pagina="vistas/autor/addautor.php";
        }else if($url[0]=="libros"){
            $pagina="vistas/libros/add.libros.php";
        }else{
            $pagina="vistas/e404.php";
        }
        return $pagina;
    }
}

?>