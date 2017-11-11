<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOCategoria();


class CategoriaController
{
    private $daoCategoria;
    public function __construct()
    {
        $this->daoCategoria = new DAOCategoria();
    }

    public function getHoras()
      {
       return $this->daoCategoria->getHoras();
      }

      public function insertHoras($horas){
        $this->daoCategoria->insertHoras($horas);
      } 

    public function getCategoriaById($hora)
      {
      	return $this->daoCategoria->getCategoriaById($hora);
      }  
    public function construirHora($resulset)
      {
    	 return $this->daoCategoria->construirHora($resulset);
      }  
    public function construirHoras($resulset)
      {
    	 return $this->daoCategoria->construirHoras($resulset);
      }
}
?>