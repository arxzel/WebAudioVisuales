<?php

class Materia{

	private $idMateria;
	private $materia;
	private $descripcion;
	private $estado;

	public function __construct(){
    }

    public function getIdMateria(){
    	return $this->idMateria;
    }

    publicn function setIdMateria ($idMateria){

    	$this->idMateria = $idMateria;
    }
    public function getMateria(){
    	return $this->materia;
    }

    publicn function setMateria ($materia){

    	$this->materia = $materia;
    }
    public function getDescripcion(){
    	return $this->descripcion;
    }

    publicn function setDescripcion ($descripcion){

    	$this->descripcion = $descripcion;
    }

    public function getEstado(){
    	return $this->estado;
    }

    publicn function setEstado ($estado){

    	$this->estado = $estado;
    }

}

?>