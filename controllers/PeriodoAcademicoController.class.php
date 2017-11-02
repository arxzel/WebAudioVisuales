<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOPeriodoAcademico();


class PeriodoAcademico
{
    private $daoPeriodoAcademico;
    public function __construct()
    {
        $this->daoPeriodoAcademico = new DAOPeriodoAcademico();
    }

    
}