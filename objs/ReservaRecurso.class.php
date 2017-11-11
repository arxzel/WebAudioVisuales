<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireidHorarioF();
*/
class ReservasRecursos{

    private $idReservaRecurso;
    private $idReserva;
    private $idRecurso;
    
    public function __construct(){
    }

    public function getidReservaRecurso(){
        return $this->idReservaRecurso;
    }

    public function setidReservaRecurso($idReservaRecurso){
        $this->idReservaRecurso = $idReservaRecurso;
    }

    public function getidReserva(){
        return $this->idReserva;
    }

    public function setidReserva($idReserva){
        $this->idReserva = $idReserva;
    }

    public function getidRecurso(){
        return $this->idRecurso;
    }

    public function setidRecurso($idRecurso){
        $this->idRecurso = $idRecurso;
    }
}
 ?>
