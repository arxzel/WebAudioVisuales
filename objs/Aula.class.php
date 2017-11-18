<?php

/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/

class Aula {

private $idAula;
private $aula;
private $descripcion;
private $idPadre;

public function __construct(){
    }

    public function getIdAula(){
        return $this->idAula;
    }

    public function setIdAula($idAula){
        $this->idAula = $idAula;
    }

    public function getAula (){
    	return $this->aula;
    }
    public function setAula ($aula){
    	$this->aula = $aula;

    public function getDescripcion (){
    	return $this->descripcion;
    }	

    public function setDescripcion ($descripcion){
    	$this->descripcion = $descripcion;
    }
    public function getIdPadre (){
    	return $this->idPadre;
    }
    public function setIdPadre ($idPadre){
    	$this->setIdPadre =$idPadre;
    }

    }

}


?>