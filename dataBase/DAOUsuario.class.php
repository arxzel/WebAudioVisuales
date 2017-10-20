<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->getRequireDatabase();
$requires->getRequireUsuario();
$requires->getRequireTipoUsuarioController();

    /**
     *
     */
    class DAOUsusario extends DataBase
    {

        function __construct()
        {
            # code...
        }

        public function getUsuarioById($usuario)
        {
            $sql = "SELECT * FROM usuarios WHERE id_usuario = " . $usuario->getIdUsuario();
            $resulset = $this-> selectQuery($sql);
            $usuario = new Usuario();
            $jefe = new Usuario();
            foreach ($resulset as $row) {

                $usuario->setIdUsuario((int) $row['id_usuario']);
                $usuario->setDocumento($row['documento']);
                $usuario->setNombres($row['nombres']);
                $usuario->setApellidos($row['apellidos']);
                $usuario->setEmail($row['email']);
                $usuario->setPasswd($row['passwd']);
                $usuario->setActivo((boolean) $row['activo']);

                //metodo para buscar el tipo de usuario
                $TipoUsuarioController =  new TipoUsuarioController();
                $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setIdTipoUsuario((int) $row['id_tipo_usuario']);
                $usuario->setTipoUsuario($TipoUsuarioController->getTipoUsuarioById($tipoUsuario));

                //metodo para buscar al jefe, **OJO ES RECURSIVA**
                if($row['id_jefe'] != 0 && $row['id_jefe'] != null && $row['id_jefe'] != '' ){
                    $jefe->setIdUsuario($row['id_jefe']);
                    $jefe = $this->getUsuarioById($jefe);
                }
            }
            $usuario->setJefe($jefe);
            return $usuario;
        }
    }

 ?>
