<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class descansos{

    private $id_horario_descanso;
    private $nombre;
    private $hora_inicio;
    private $duration;
    private $estado;


    public function __construct(){
    }

    public function getId_horario_descanso(){
        return $this->id_horario_descanso;
    }

    public function setId_horario_descanso($id_horario_descanso){
        $this->id_horario_descanso = $id_horario_descanso;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getHora_inicio(){
        return $this->hora_inicio;
    }

    public function setHora_inicio($hora_inicio){
        $this->hora_inicio = $hora_inicio;
    }
    public function getDuration(){
        return $this->duration;
    }

    public function setDuration($duration){
        $this->duration = $duration;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}
 ?>
