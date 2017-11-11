<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequirehoraFinal();
*/
class Reservas{

    private $idReserva;
    private $fechaReserva;
    private $infoAdicional;
    private $fecha;
    private $estado;
    private $idAula;
    private $horaInicio;
    private $horaFinal;
    private $idUsuario;
    private $idMateria;

    public function __construct(){
    }

    public function getidReserva(){
        return $this->idReserva;
    }

    public function setidReserva($idReserva){
        $this->idReserva = $idReserva;
    }

    public function getfechaReserva(){
        return $this->fechaReserva;
    }

    public function setfechaReserva($fechaReserva){
        $this->fechaReserva = $fechaReserva;
    }

    public function getinfoAdicional(){
        return $this->infoAdicional;
    }

    public function setinfoAdicional($infoAdicional){
        $this->infoAdicional = $infoAdicional;
    }

    public function getfecha(){
        return $this->fecha;
    }

    public function setfecha($fecha){
        $this->fecha = $fecha;
    }

    public function getestado(){
        return $this->estado;
    }

    public function setestado($estado){
        $this->estado = $estado;
    }

    public function getidAula(){
        return $this->idAula;
    }

    public function setidAula($idAula){
        $this->idAula = $idAula;
    }

    public function gethoraInicio(){
        return $this->horaInicio;
    }

    public function sethoraInicio($horaInicio){
        $this->horaInicio = $horaInicio;
    }

    public function gethoraFinal(){
        return $this->horaFinal;
    }

    public function sethoraFinal($horaFinal){
        $this->horaFinal = $horaFinal;
    }

    public function getidUsuario(){
        return $this->idUsuario;
    }

    public function setidUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function getidMateria(){
        return $this->idMateria;
    }

    public function setidMateria($idMateria){
        $this->idMateria = $idMateria;
    }
}
 ?>
