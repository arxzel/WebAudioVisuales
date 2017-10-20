<?php
class TipoUsuario{
    private $idTipoUsuario;
    private $tipoUsuario;
    private $descripcion;

    public function __construct(){

    }

    public function getIdTipoUsuario (){
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario;
    }

    public function getTipoUsuario (){
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getDescripcion (){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
}
 ?>
