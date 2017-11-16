<?php

/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/

class GrupoMateria{

	private $idGrupoMateria;
	private $diaSemana;
	private $idMateria;
	private $idAula;
	private $idUsuario;
	private $idPeriodoAcademico,
	private $horaInicial;
	private $horaFinal;

	public function __construct(){
    }

    public function getIdGrupoMateria(){
    	return $this->idGrupoMateria;
    }

    public function setIdGrupoMateria($idGrupoMateria){
    	$this->idGrupoMateria = $idGrupoMateria;
    }

    public function getDiaSemana(){
    	return $this->diaSemana;
    }

    public function setDiaSemana($diaSemana){
    	$this->diaSemana = $diaSemana;
    }


    public function getIdMateria(){
    	return $this->idMateria;
    }

    public function setIdMateria($idMateria){
    	$this->idMateria = $idMateria;
    }


    public function getIdAula(){
    	return $this->idAula;
    }

    public function setIdAula($idAula){
    	$this->idAula = $idAula;
    }


    public function getIdUsuario(){
    	return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
    	$this->idUsuario = $idUsuario;
    }


    public function getIdPeriodoAcademico(){
    	return $this->idPeriodoAcademico;
    }

    public function setIdPeriodoAcademico($idPeriodoAcademico){
    	$this->idPeriodoAcademico = $idPeriodoAcademico;
    }


    public function getHoraInicial(){
    	return $this->horaInicial;
    }

    public function setHoraInicial($horaInicial){
    	$this->horaInicial = $horaInicial;
    }


    public function getHoraInicial(){
    	return $this->horaFinal;
    }

    public function setHoraFinal($horaFinal){
    	$this->horaFinal = $horaFinal;
    }

}
?>