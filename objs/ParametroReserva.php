<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class ParametroReserva{

    private $id_parametro;
    private $nombre;
    private $dias_minimos;
    private $tiempo_minimo;
    private $dias_maximo;
    private $tiempo_maximo;
    private $estado;


    public function __construct(){
    }

    public function getId_parametro(){
        return $this->id_parametro;
    }

    public function setId_parametro($id_parametro){
        $this->id_parametro = $id_parametro;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getDias_minimos(){
        return $this->dias_minimos;
    }

    public function setDias_minimos($dias_minimos){
        $this->dias_minimos = $dias_minimos;
    }
    public function getTiempo_minimo(){
        return $this->tiempo_minimo;
    }

    public function setTiempo_minimo($tiempo_minimo){
        $this->tiempo_minimo = $tiempo_minimo;
    }
    public function getDias_maximo(){
        return $this->dias_maximo;
    }

    public function setDias_maximo($dias_maximo){
        $this->dias_maximo = $dias_maximo;
    }
    public function getTiempo_maximo(){
        return $this->tiempo_maximo;
    }

    public function setTiempo_maximo($tiempo_maximo){
        $this->tiempo_maximo = $tiempo_maximo;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }
}
 ?>
