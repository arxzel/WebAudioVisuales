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

    
    public function getCategoriaById($categoria)
      {
      	return $this->daoCategoria->getCategoriaById($categoria);
      }  
      public function updateCatergoria($categoria){
        retun $this->daoCategoria->updateCatergoria($categoria);
      }
}
?>