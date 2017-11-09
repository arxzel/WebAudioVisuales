<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOHora();


class HoraController
{
    private $daoHora;
    public function __construct()
    {
        $this->daoHora = new DAOHora();
    }

    public function getHoras($hora)
      {
       return $this->daoHora->getHoras($hora);
      }
    public function getHorasById($hora)
      {
      	return $this->daoHora->getHorasById($hora);
      }  
    private function construirHora($resulset)
    {
    	$this->daoHora->construirHora($resulset);
    }  
    private function construirHoras($resulset)
    {
    	$this->daoHora->construirHoras($resulset);
    }
}
?>
