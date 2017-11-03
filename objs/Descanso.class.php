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

<<<<<<< HEAD
    public function setDuracion($duracion){
=======
    public function setDuration($duracion){
>>>>>>> e508c7811724b69bb9745760b9cf9561c0d5b364
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
