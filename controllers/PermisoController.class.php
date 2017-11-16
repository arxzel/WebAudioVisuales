<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOPermiso();


class PermisoController
{
    private $daoPermiso;
    public function __construct()
    {
        $this->daoPermiso = new DAOPermiso();
    }

    
}