<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOReserva();


class ReservaController
{
    private $daoReserva;
    public function __construct()
    {
        $this->daoReserva = new DAOReserva();
    }

    
}