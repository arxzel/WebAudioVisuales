<?php
class Permiso{
    private $idPermiso;
    private $permiso;
    private $valor;

    public function __construct(){

    }

    public function getIdPermiso (){
        return $this->idPermiso;
    }

    public function setIdPermiso($idPermiso){
        $this->idPermiso = $idPermiso;
    }

    public function getPermiso (){
        return $this->permiso;
    }

    public function setPermiso($permiso){
        $this->permiso = $permiso;
    }

    public function getValor (){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }
}
 ?>
