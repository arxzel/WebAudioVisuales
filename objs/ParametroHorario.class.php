<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class ParametroHorario{

    private $idParametroHorario;
    private $nombre;
    private $horaInicioJornada;
    private $horaFinalJornada;
    private $duracionHoraAcademica;
    private $estado;


    public function __construct(){
    }

    public function getIdParametroHorario(){
        return $this->idParametroHorario;
    }

    public function setIdParametroHorario($idParametroHorario){
        $this->idParametroHorario = $idParametroHorario;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getHoraInicioJornada(){
        return $this->horaInicioJornada;
    }

    public function setHoraInicioJornada($horaInicioJornada){
        $this->horaInicioJornada = $horaInicioJornada;
    }
    public function getHoraFinalJornada(){
        return $this->horaFinalJornada;
    }

    public function setHoraFinalJornada($horaFinalJornada){
        $this->horaFinalJornada = $horaFinalJornada;
    }
    public function getDuracionHoraAcademica(){
        return $this->duracionHoraAcademica;
    }

    public function setDuracionHoraAcademica($duracionHoraAcademica){
        $this->duracionHoraAcademica = $duracionHoraAcademica;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}
 ?>
