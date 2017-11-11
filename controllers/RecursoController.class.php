<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAORecurso();


class RecursoController
{
    private $daoRecurso;
    public function __construct()
    {
        $this->daoHora = new DAORecurso();
    }

    public function getHoras()
      {
       return $this->daoHora->getHoras();
      }

      public function insertHoras($horas){
        $this->daoHora->insertHoras($horas);
      } 

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