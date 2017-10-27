<?php
/*require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires -> getRequireTipoUsuario();
*/
class Usuario{

    private $id_periodo_academico;
    private $nombre;
    private $fecha_inicio;
    private $fecha_final;
    private $estado;
    private $descripcion;


    public function __construct(){
    }

    public function getId_periodo_academico(){
        return $this->id_periodo_academico;
    }

    public function setId_periodo_academico($id_periodo_academico){
        $this->id_periodo_academico = $id_periodo_academico;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getFecha_inicio(){
        return $this->fecha_inicio;
    }

    public function setFecha_inicio($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;
    }
    public function getFecha_final(){
        return $this->fecha_final;
    }

    public function setFecha_final($fecha_final){
        $this->fecha_final = $fecha_final;
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
