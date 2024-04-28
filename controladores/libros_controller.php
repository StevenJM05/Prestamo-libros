<?php 
require_once("conexion.php");
class LibrosController extends Conexion{
    public function agregar($libros) {
        $sql = "INSERT INTO libros (titulo, autor, editorial, fecha_edicion, ISBN) 
                VALUES ('{$libros->getTitulo()}', '{$libros->getAutor()}', '{$libros->getEditorial()}', '{$libros->getFechaEdicion()}', '{$libros->getISBN()}')";
        $rs = $this->ejecutarSQL($sql);
    }

    public function listar(){
        $sql = "SELECT * FROM libros";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while($fila = $rs->fetch_assoc()){
            $resultado = new Libros($fila["id_libros"], $fila["titulo"], $fila["autor"], $fila["editorial"], $fila["fecha_edicion"], $fila["ISBN"]);
        }

        return $resultado;
     }
    public function update($libros, $id) {
        $sql = "UPDATE libros
                SET
                titulo = '{$libros->getTitulo()}',
                autor = '{$libros->getAutor()}',
                editorial = '{$libros->getEditorial()}',
                fecha_edicion = '{$libros->getFechaEdicion()}',
                ISBN = '{$libros->getISBN()}'
                WHERE id_libros = $id";
        $rs = $this->ejecutarSQL($sql);
    } 

    public function delete($id) {
        $sql = "DELETE FROM libros WHERE id_libros = $id";
        $rs = $this->ejecutarSQL($sql);
    }   
}
?>
