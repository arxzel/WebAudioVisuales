<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class ParametroHorario{

    private $id_parametro_horario;
    private $nombre;
    private $hora_inicio_jornada;
    private $hora_final_jornada;
    private $duracion_hora_academica;
    private $estado;


    public function __construct(){
    }

    public function getId_parametro_horario(){
        return $this->id_parametro_horario;
    }

    public function setId_parametro_horario($id_parametro_horario){
        $this->id_parametro_horario = $id_parametro_horario;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getHora_inicio_jornada(){
        return $this->hora_inicio_jornada;
    }

    public function setHora_inicio_jornada($hora_inicio_jornada){
        $this->hora_inicio_jornada = $hora_inicio_jornada;
    }
    public function getHora_final_jornada(){
        return $this->hora_final_jornada;
    }

    public function setHora_final_jornada($hora_final_jornada){
        $this->hora_final_jornada = $hora_final_jornada;
    }
    public function getDuracion_hora_academica(){
        return $this->duracion_hora_academica;
    }

    public function setDuracion_hora_academica($duracion_hora_academica){
        $this->duracion_hora_academica = $duracion_hora_academica;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}
 ?>
