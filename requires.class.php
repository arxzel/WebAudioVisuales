<?php

class Requires
{
    private $root = '';

    function __construct(){
        $this->root = $_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales';
    }

    //FUNCION PARA RETORNAR LA DB
    public function getRequireDatabase(){
        require_once($this->root.'/dataBase/DataBase.class.php');
    }

    /*************************************************************************
    * FUNCIONES PARA RETORNAR A LOS DAOS.
    *************************************************************************/

    public function getRequireDAOUsuario(){
        require_once($this->root.'/dataBase/DAOUsuario.class.php');
    }

    public function getRequireDAOPermiso(){
        require_once($this->root.'/dataBase/DAOPermiso.class.php');
    }

    public function getRequireDAOTipoUsuario(){
        require_once($this->root.'/dataBase/DAOTipoUsuario.class.php');
    }

    public function getRequireDAOTipoUsuarioPermiso(){
        require_once($this->root.'/dataBase/DAOTipoUsuarioPermiso.class.php');
    }

    /*************************************************************************
    * FUNCIONES PARA RETORNAR A LOS CONTROLADORES.
    *************************************************************************/

    public function getRequireUsuarioController(){
        require_once($this->root.'/controllers/UsuarioController.class.php');
    }

    public function getRequirePermisoController(){
        require_once($this->root.'/controllers/PermisoController.class.php');
    }

    public function getRequireTipoUsuarioController(){
        require_once($this->root.'/controllers/TipoUsuarioController.class.php');
    }

    public function getRequireTipoUsuarioPermisoController(){
        require_once($this->root.'/controllers/TipoUsuarioPermisoController.class.php');
    }

    /*************************************************************************
    *FUNCIONES PARA RETORNAR LOS OBJETOS
    *************************************************************************/

    public function getRequireUsuario(){
        require_once($this->root.'/objs/Usuario.class.php');
    }

    public function getRequireTipoUsuario(){
        require_once($this->root.'/objs/TipoUsuario.class.php');
    }

    public function getRequirePermiso(){
        require_once($this->root.'/objs/Permiso.class.php');
    }

    public function getRequirePermisoTipoUsuario(){
        require_once($this->root.'/objs/TipoUsuarioPermiso.class.php');
    }

}

 ?>
