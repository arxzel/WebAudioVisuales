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

    
    public function getCategoriaById($hora)
      {
      	return $this->daoCategoria->getCategoriaById($hora);
      }  
}
?>