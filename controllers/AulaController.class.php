<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOAula();


class AulaController
{
    private $daoAula;
    public function __construct()
    {
        $this->daoAula = new DAOAula();
    }

    
}