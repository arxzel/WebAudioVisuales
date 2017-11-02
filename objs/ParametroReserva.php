<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class ParametroReserva{

    private $idParametro;
    private $nombre;
    private $diasMinimos;
    private $tiempoMinimo;
    private $diasMaximo;
    private $tiempoMaximo;
    private $estado;


    public function __construct(){
    }

    public function getIdParametro(){
        return $this->idParametro;
    }

    public function setIdParametro($idParametro){
        $this->idParametro = $idParametro;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getDiasMinimos(){
        return $this->diasMinimos;
    }

    public function setDiasMinimos($diasMinimos){
        $this->diasMinimos = $diasMinimos;
    }
    public function getTiempoMinimo(){
        return $this->tiempoMinimo;
    }

    public function setTiempoMinimo($tiempoMinimo){
        $this->tiempoMinimo = $tiempoMinimo;
    }
    Mblic function getDiasMaximo(){
        return $this->diasMaximo;
    }

    public function setDias_maximo($diasMaximo){
        $this->diasMaximo = $diasMaximo;
    }
    public function getTiempoMaximo(){
        return $this->tiempoMaximo;
    }

    public function setTiempo_maximo($tiempoMaximo){
        $this->tiempoMaximo = $tiempoMaximo;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
}
 ?>
