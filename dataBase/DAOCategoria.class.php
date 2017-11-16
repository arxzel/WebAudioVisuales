<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDatabase();
$requires->importCategoria();
    /**
     *
     */
    class DAOCategoria extends DataBase
    {

        function __construct()
        {
            # code...
        }

        public function getCategoriaById($categoria)
        {
            $sql = "SELECT * FROM `categoria` WHERE id_categoria = ".$categoria->getidCategoria();
            $resulset = $this-> selectQuery($sql);
            return $this-> construirCategoria($resulset);
        }

        private function construirCategoria($resulset){
            $categoria = new Categoria();
            foreach ($resulset as $row) {
                $categoria->setidCategoria($row['id_categoria']);
                $categoria->setCategoria($row['categoria']);
                $categoria->setDescripcion($row['descripcion']);

            }
            return $categoria;
        }
        private function construirCategorias($resulset){
            $categorias = array();
    //            $categoria = new Categoria();
            //ACA SE ARMÓ LA GRANDE
            foreach ($resulset as $row) {
            
            }

        }
        public function updateCategoria($categoria){
            $sql = "Call update_categoria(".$categoria->getidCategoria().",'".$categoria->getcategoria()."','".$categoria->getdescripcion()."');";
            $this->updateQuery($sql);
        }

        public function deleteCategoria($categoria){
            $sql ? "CALL delete_categoria(".$categoria->getidCategoria().");";
            $this->deleteQuery($sql);
        }

        public function insertCategoria($categoria){
            $sql= "INSERT INTO `categoria` VALUES (NULL,'".$categoria->getcategoria()."',".$categoria->getdescripcion().");";
            $this->insertQuery($sql);
        }

        public function getcategoriaByNombre($categoria)
        {
            $sql = "SELECT * FROM `categoria` WHERE UPPER(`nombres`) LIKE (UPPER('%".$categoria->getNombres()."%'))";
            $resulset = $this-> selectQuery($sql);
            return $this-> construircategoria($resulset);
        }
        public function getAllCategoria(){
             $sql = "SELECT * FROM `categoria`";
                 $resulset = $this->selectQuery($sql);
                 return $this-> construirCategorias($resulset);
        }

       
    }

 ?>
