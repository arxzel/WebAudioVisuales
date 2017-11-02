<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class descansos{

    private $idHorarioDescanso;
    private $nombre;
    private $horaInicio;
    private $duracion;
    private $estado;


    public function __construct(){
    }

    public function getIdHorarioDescanso(){
        return $this->idHorarioDescanso;
    }

    public function setIdHorarioDescanso($idHorarioDescanso){
        $this->idHorarioDescanso = $idHorarioDescanso;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setHoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }
    public function getDuracion(){
        return $this->duracion;
    }

    public function setDuracion($duracion){
        $this->duracion = $duracion;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}
 ?>
