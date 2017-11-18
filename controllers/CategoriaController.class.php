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
        return $this->daoCategoria->updateCatergoria($categoria);
      }

      public function deleteCategoria($categoria){
        $this->daoCategoria->deleteCategoria($categoria);
      }
      public function insertCategoria($categoria){
        $this->daoCategoria->insertCategoria($categoria);
      }
      public function getAllCategorias(){
        return $this->daoCategoria->getAllCategorias();
      }
}
?>