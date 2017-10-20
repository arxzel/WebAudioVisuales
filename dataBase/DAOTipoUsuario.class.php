<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->getRequireDatabase();
$requires->getRequireTipoUsuario();

    /**
     *
     */
    class DAOTipoUsuario extends DataBase
    {

        function __construct()
        {
            # code...
        }

        public function getTipoUsuarioById($tipoUsuario)
        {
            $sql = "SELECT * FROM tipos_usuarios WHERE id_tipo_usuario = " . $tipoUsuario->getIdTipoUsuario();
            $resulset = $this-> selectQuery($sql);
            $tipoUsuario = new TipoUsuario();

            foreach ($resulset as $row) {
                $tipoUsuario->setIdTipoUsuario((int) $row['id_tipo_usuario']);
                $tipoUsuario->setTipoUsuario($row['tipo_usuario']);
                $tipoUsuario->setDescripcion($row['descripcion']);
            }
            return $tipoUsuario;
        }
    }

 ?>
