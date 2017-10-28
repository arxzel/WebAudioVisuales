<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAODescanso();


class DescansoControler
{
    private $daoDescanso;
    public function __construct()
    {
        $this->daoDescanso = new DAODescanso();
    }

    public function getDescansoById($descanso)
    {
        return $this->daoDescanso->getDescansoById($descanso);
    }
}
