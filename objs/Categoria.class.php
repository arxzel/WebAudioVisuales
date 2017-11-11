<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireidHorarioF();
*/
class Categoria{

    private $idCategoria;
    private $categoria;
    private $descripcion;
    
    public function __construct(){
    }

    public function getidCategoria(){
        return $this->idCategoria;
    }

    public function setidCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }

    public function getcategoria(){
        return $this->categoria;
    }

    public function setcategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getdescripcion(){
        return $this->descripcion;
    }

    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
}
 ?>
