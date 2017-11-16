<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOMateria();


class MateriaController
{
    private $daoMateria;
    public function __construct()
    {
        $this->daoMateria = new DAOMateria();
    }

    
}