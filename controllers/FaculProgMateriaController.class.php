<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOFaculProgMateria();


class FaculProgMateria
{
    private $daoFacultad;
    public function __construct()
    {
        $this->daoFacultad = new DAOFaculProgMateria();
    }

    
}