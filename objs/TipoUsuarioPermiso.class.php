<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->getRequireTipoUsuario();
$requires->getRequirePermiso();

class TipoUsuarioPermiso{
    private $idTipoUsuarioPermiso;
    private $tipoUsuario;
    private $permiso;

    public function __construct(){

    }

    public function getIdTipoUsuarioPermiso (){
        return $this->idTipoUsuarioPermiso;
    }

    public function setIdTipoUsuarioPermiso($idTipoUsuarioPermiso){
        $this->idTipoUsuarioPermiso = $idTipoUsuarioPermiso;
    }

    public function getTipoUsuario (){
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getPermiso (){
        return $this->permiso;
    }

    public function setPermiso($permiso){
        $this->permiso = $permiso;
    }
}
 ?>
