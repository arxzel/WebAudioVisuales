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
                $categoria->setDocumento($row['documento']);
                $categoria->setNombres($row['nombres']);
                $categoria->setApellidos($row['apellidos']);
                $categoria->setEmail($row['email']);
                $categoria->setPasswd($row['passwd']);
                $categoria->setActivo((boolean) $row['activo']);

                //metodo para buscar el tipo de categoria
                $DAOTipocategoria =  new DAOTipocategoria();
                $tipocategoria = new Tipocategoria();
                $tipocategoria->setIdTipocategoria((int) $row['id_tipo_categoria']);
                $categoria->setTipocategoria($DAOTipocategoria->getTipocategoriaById($tipocategoria));

            }
            return $categoria;
        }







        public function getcategoriaByNombre($categoria)
        {
            $sql = "SELECT * FROM `categorias` WHERE UPPER(`nombres`) LIKE (UPPER('%".$categoria->getNombres()."%'))";
            $resulset = $this-> selectQuery($sql);
            return $this-> construircategoria($resulset);
        }

       
    }

 ?>
