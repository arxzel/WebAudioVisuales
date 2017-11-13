<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class PeriodoAcademico{

    private $idPeriodoAcademico;
    private $nombre;
    private $fechaInicio;
    private $fechaFinal;
    private $estado;
    private $descripcion;


    public function __construct(){
    }

    public function getIdPeriodoAcademico(){
        return $this->idPeriodoAcademico;
    }

    public function setIdPeriodoAcademico($idPeriodoAcademico){
        $this->idPeriodoAcademico = $idPeriodoAcademico;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }
    public function getFechaFinal(){
        return $this->fechaFinal;
    }

    public function setFechaFinal($fechaFinal){
        $this->fechaFinal = $fechaFinal;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

}
 ?>
