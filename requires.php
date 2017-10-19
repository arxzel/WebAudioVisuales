<?php

class Requires
{
    private $root = '';

    function __construct(){
        $this->root = $_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales';
    }

    //FUNCION PARA RETORNAR LA DB
    public function getRequireDatabase(){
        require_once($this->root.'/dataBase/DataBase.php');
    }

    /**
    * FUNCIONES PARA RETORNAR A LOS CONTROLADORES.
    */

    public function getRequireControllerUsuarios(){
        require_once($this->root.'/controllers/UsuariosController.php');
    }

    /**
    *FUNCIONES PARA RETORNAR LOS OBJETOS
    */

    public function getRequireUsuario(){
        require_once($this->root.'/objs/Usuario.php');
    }


}

 ?>
