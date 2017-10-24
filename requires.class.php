<?php

class Requires
{
    private $root = '';

    function __construct(){
        $this->root = $_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales';
    }

    //FUNCION PARA RETORNAR LA DB
    public function importDatabase(){
        require_once($this->root.'/dataBase/DataBase.class.php');
    }

    /*************************************************************************
    * FUNCIONES PARA RETORNAR A LOS DAOS.
    *************************************************************************/

    public function importDAOUsuario(){
        require_once($this->root.'/dataBase/DAOUsuario.class.php');
    }

    public function importDAOPermiso(){
        require_once($this->root.'/dataBase/DAOPermiso.class.php');
    }

    public function importDAOTipoUsuario(){
        require_once($this->root.'/dataBase/DAOTipoUsuario.class.php');
    }

    public function importDAOTipoUsuarioPermiso(){
        require_once($this->root.'/dataBase/DAOTipoUsuarioPermiso.class.php');
    }

    public function importDAOHora(){
        require_once($this->root.'/dataBase/DAOHora.class.php');
    }

    public function importDAODescanso(){
        require_once($this->root.'/dataBase/DAODescanso.class.php');
    }

    public function importDAOParametroHorario(){
        require_once($this->root.'/dataBase/DAOParametroHorario.class.php');
    }

    public function importDAOParametroReserva(){
        require_once($this->root.'/dataBase/DAOParametroReserva.class.php');
    }

    public function importDAOPeriodoAcademico(){
        require_once($this->root.'/dataBase/DAOPeriodoAcademico.class.php');
    }

    /*************************************************************************
    * FUNCIONES PARA RETORNAR A LOS CONTROLADORES.
    *************************************************************************/

    public function importUsuarioController(){
        require_once($this->root.'/controllers/UsuarioController.class.php');
    }

    public function importPermisoController(){
        require_once($this->root.'/controllers/PermisoController.class.php');
    }

    public function importTipoUsuarioController(){
        require_once($this->root.'/controllers/TipoUsuarioController.class.php');
    }

    public function importTipoUsuarioPermisoController(){
        require_once($this->root.'/controllers/TipoUsuarioPermisoController.class.php');
    }

    public function importHoraController(){
        require_once($this->root.'/controllers/HoraController.class.php');
    }

    public function importDescansoController(){
        require_once($this->root.'/controllers/DescansoController.class.php');
    }

    public function importParametroHorarioController(){
        require_once($this->root.'/controllers/ParametroHorarioController.class.php');
    }

    public function importParametroReservaController(){
        require_once($this->root.'/controllers/ParametroReservaController.class.php');
    }

    public function importPeriodoAcademicoController(){
        require_once($this->root.'/controllers/PeriodoAcademicoController.class.php');
    }

    /*************************************************************************
    *FUNCIONES PARA RETORNAR LOS OBJETOS
    *************************************************************************/

    public function importUsuario(){
        require_once($this->root.'/objs/Usuario.class.php');
    }

    public function importTipoUsuario(){
        require_once($this->root.'/objs/TipoUsuario.class.php');
    }

    public function importPermiso(){
        require_once($this->root.'/objs/Permiso.class.php');
    }

    public function importPermisoTipoUsuario(){
        require_once($this->root.'/objs/TipoUsuarioPermiso.class.php');
    }

    public function importHora(){
        require_once($this->root.'/objs/Hora.class.php');
    }

    public function importDescanso(){
        require_once($this->root.'/objs/Descanso.class.php');
    }

    public function importParametroHorario(){
        require_once($this->root.'/objs/ParametroHorario.class.php');
    }

    public function importParametroReserva(){
        require_once($this->root.'/objs/ParametroReserva.class.php');
    }

    public function importPriodoAcademico(){
        require_once($this->root.'/objs/TriodoAcademico.class.php');
    }

}

 ?>
