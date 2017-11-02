<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAODescanso();


class DescansoController
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

    public function getDescansoByNombre($descanso)
    {
    	return$this->daoDescanso->getDescansoByNombre($descanso);
    }

    public function getDescansoByEstado($descanso)
    {
    	return$this->daoDescanso->getDescansoByEstado->($descanso);
    }

    public function insertDescanso($descanso)
    {
    	$this->daoDescanso->insertDescanso($descanso);
    }
    public function deleteDescanso($descanso,$usuario)
     {
     	$this->daoDescanso->deleteDescanso($descanso,$usuario);
     }

    public function updateDescanso($descanso,$usuario)
      {
      	$this->daoDescanso->updateDescanso($descanso,$usuario);
      }

    private function construirDescanso($resulset)
      {
      	$this->daoDescanso->construirDescanso($resulset);
      }
}
