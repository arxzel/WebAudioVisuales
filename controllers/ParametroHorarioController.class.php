<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOParametroHorario();


class ParametroHorario
{
    private $daoParametroHorario;
    public function __construct()
    {
        $this->daoParametroHorario = new daoParametroHorario();
    }

    


}