<?php

/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/

class FaculProgMateria {

	private $idFaculProgMateria;
	private $idMateria;
	private $idFaculProgDep;

	public function __construct(){
    }

    public function getIdFaculProgDep(){
    	return $this->idFaculProgDep;
    }

    public function setIdFaculProgDep($idFaculProgDep){
    	$this->idFaculProgDep = $idFaculProgDep;
    }

    public function getIdMateria(){
    	return $this->idMateria;
    }

    public function setIdMateria($idMateria){
    	$this->idMateria = $idMateria;
    }


    public function getIdFaculProgMateria(){
    	return $this->idFaculProgMateria;
    }

    public function setIdFaculProgMateria($idFaculProgMateria){
    	$this->idFaculProgMateria = $idFaculProgMateria;
    }
}

?>