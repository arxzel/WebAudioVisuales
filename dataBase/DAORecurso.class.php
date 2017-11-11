<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDatabase();
$requires->importRecurso();
$requires->importDAOCategoria();

    /**
     *
     */
    class DAORecurso extends DataBase
    {

        function __construct()
        {
            # code...
        }

        public function getUsuarioById($usuario)
        {
            $sql = "SELECT * FROM `usuarios` WHERE id_usuario = ".$usuario->getIdUsuario();
            $resulset = $this-> selectQuery($sql);
            return $this-> construirUsuario($resulset);
        }

        public function getUsuarioByNombre($usuario)
        {
            $sql = "SELECT * FROM `usuarios` WHERE UPPER(`nombres`) LIKE (UPPER('%".$usuario->getNombres()."%'))";
            $resulset = $this-> selectQuery($sql);
            return $this-> construirUsuario($resulset);
        }

       
    }

 ?>
