<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOTipoUsuarioPermiso();


class TipoUsuarioPermisoController
{
    private $daoUsuarioPermiso;
    public function __construct()
    {
        $this->daoUsuarioPermiso = new DAOTipoUsuarioPermiso();
    }

    
}