<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireidHorarioF();
*/
class Recursos{

    private $idRecurso;
    private $CIU;
    private $recurso;
    private $descripcion;
    private $estado;
    private $idCategoria;
    
    public function __construct(){
    }

    public function getidRecurso(){
        return $this->idRecurso;
    }

    public function setidRecurso($idRecurso){
        $this->idRecurso = $idRecurso;
    }

    public function getCIU(){
        return $this->CIU;
    }

    public function setCIU($CIU){
        $this->CIU = $CIU;
    }

    public function getrecurso(){
        return $this->recurso;
    }

    public function setrecurso($recurso){
        $this->recurso = $recurso;
    }

    public function getdescripcion(){
        return $this->descripcion;
    }

    public function setdescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getestado(){
        return $this->estado;
    }

    public function setestado($estado){
        $this->estado = $estado;
    }
    public function getidCategoria(){
        return $this->idCategoria;
    }

    public function setidCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
}
 ?>
