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

    public function importDAOParametroReserva(){
        require_once($this->root.'/dataBase/DAOParametroReserva.class.php');
    }

    public function importDAOPeriodoAcademico(){
        require_once($this->root.'/dataBase/DAOPeriodoAcademico.class.php');
    }

    public function importDAOGrupoMateria(){
        require_once($this->root.'/dataBase/DAOGrupoMateria.class.php');
    }

    public function importDAOFaculProgDep(){
        require_once($this->root.'/dataBase/DAOFaculProgDep.class.php');
    }

    public function importDAOMateria(){
        require_once($this->root.'/dataBase/DAOMateria.class.php');
    }

    public function importDAOAula(){
        require_once($this->root.'/dataBase/DAOAula.class.php');
    }

    public function importDAOFaculProgDepMateria(){
        require_once($this->root.'/dataBase/DAOFaculProgDepMateria.class.php');
    }

    public function importDAOReserva(){
        require_once($this->root.'/dataBase/DAOReserva.class.php');
    }

    public function importDAOReservaRecurso(){
        require_once($this->root.'/dataBase/DAOReservaRecurso.class.php');
    }

    public function importDAORecurso(){
        require_once($this->root.'/dataBase/DAORecurso.class.php');
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

    public function importParametroReservaController(){
        require_once($this->root.'/controllers/ParametroReservaController.class.php');
    }

    public function importPeriodoAcademicoController(){
        require_once($this->root.'/controllers/PeriodoAcademicoController.class.php');
    }

    public function importGrupoMateriaController(){
        require_once($this->root.'/controllers/GrupoMateriaController.class.php');
    }

    public function importFaculProgDepController(){
        require_once($this->root.'/controllers/FaculProgDepController.class.php');
    }

    public function importMateriaController(){
        require_once($this->root.'/controllers/MateriaController.class.php');
    }

    public function importAulaController(){
        require_once($this->root.'/controllers/AulaController.class.php');
    }

    public function importFaculProgDepMateriaController(){
        require_once($this->root.'/controllers/FaculProgDepMateriaController.class.php');
    }

    public function importReservaController(){
        require_once($this->root.'/controllers/ReservaController.class.php');
    }

    public function importReservaRecursoController(){
        require_once($this->root.'/controllers/ReservaRecursoController.class.php');
    }

    public function importRecursoController(){
        require_once($this->root.'/controllers/RecursoController.class.php');
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

    public function importParametroReserva(){
        require_once($this->root.'/objs/ParametroReserva.class.php');
    }

    public function importPriodoAcademico(){
        require_once($this->root.'/objs/TriodoAcademico.class.php');
    }

    public function importGrupoMateria(){
        require_once($this->root.'/objs/GrupoMateria.class.php');
    }

    public function importFaculProgDep(){
        require_once($this->root.'/objs/FaculProgDep.class.php');
    }

    public function importMateria(){
        require_once($this->root.'/objs/Materia.class.php');
    }

    public function importAula(){
        require_once($this->root.'/objs/Aula.class.php');
    }

    public function importFaculProgDepMateria(){
        require_once($this->root.'/objs/FaculProgDepMateria.class.php');
    }

    public function importReserva(){
        require_once($this->root.'/objs/Reserva.class.php');
    }

    public function importReservaRecurso(){
        require_once($this->root.'/objs/ReservaRecurso.class.php');
    }

    public function importRecurso(){
        require_once($this->root.'/objs/Recurso.class.php');
    }
}
 ?>
