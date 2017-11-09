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

    public function getHoras()
      {
       return $this->daoHora->getHoras();
      }
    public function updateHoras($hora)
    public function getHoraById($hora)
      {
      	return $this->daoHora->getHoraById($hora);
      }  
    public function construirHora($resulset)
      {
    	 return $this->daoHora->construirHora($resulset);
      }  
    public function construirHoras($resulset)
      {
    	 return $this->daoHora->construirHoras($resulset);
      }
}
?>