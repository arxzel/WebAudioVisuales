<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->getRequireTipoUsuario();
$requires->getRequirePermiso();

class PermisoTipoUsuario{
    private $idPermisoTipoUsuario;
    private $tipoUsuario;
    private $permiso;

    public function __construct(){

    }

    public function getIdPermisoTipoUsuario (){
        return $this->idPermisoTipoUsuario;
    }

    public function setIdPermisoTipoUsuario($idPermisoTipoUsuario){
        $this->idPermisoTipoUsuario = $idPermisoTipoUsuario;
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
