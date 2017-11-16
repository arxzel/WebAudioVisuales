<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOGrupoMateria();


class GrupoMateriaController
{
    private $daoGrupoMateria;
    public function __construct()
    {
        $this->daoGrupoMateria = new DAOGrupoMateria();
    }

}