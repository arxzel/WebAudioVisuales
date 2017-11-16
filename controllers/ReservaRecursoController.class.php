<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOReservaRecurso();


class ReservaRecursoController
{
    private $daoReserva;
    public function __construct()
    {
        $this->daoReserva = new DAOReservaRecurso();
    }

    
}