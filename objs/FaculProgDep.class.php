<?php

class FaculProgDep{

	private $idFaculProgDep;
	private $codigo;
	private $nombre;
	private $estado;
	private $idPadreFacultadPrograma;

	public function __construct(){
    }

    public function getIdFaculProgDep(){
    	return $this->idFaculProgDep;
    }

    public function setIdFaculProgDep($idFaculProgDep){
    	$this->idFaculProgDep = $idFaculProgDep;
    }

    public function getCodigo(){
    	return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getNombre(){
    	return $this->nombre;
    }

    public function setNombre($nombre){
    	$this->nombre = $nombre;
    }

    public function getEstado(){
    	return $this->estado;
    }

    public function setEstado($estado){
    	$this->estado = $estado;
    }

    public function getidPadreFacultadPrograma(){
    	return $this->idPadreFacultadPrograma;
    }

    public function setidPadreFacultadPrograma($idPadreFacultadPrograma){
    	$this->idPadreFacultadPrograma = $idPadreFacultadPrograma;
    }
}

?>