<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->getRequireDatabase();
$requires->getRequirePermiso();

    /**
     *
     */
    class DAOPermiso extends DataBase
    {

        function __construct()
        {
            # code...
        }

        protected function getUsuarioById($usuario)
        {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = " . $usuario->getIdUsuario();
            echo $sql;
            $resulset = $this-> selectQuery($sql);
            foreach ($resulset as $row) {
                echo "<li>{$row['id_usuario']}</li>";
                echo "<li>{$row['nombres']}</li>";
                echo "<li>{$row['apellidos']}</li>";
                echo "<li>{$row['email']}</li>";
            }
        }
    }

 ?>
