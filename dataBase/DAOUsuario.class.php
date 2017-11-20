<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDatabase();
$requires->importUsuario();
$requires->importDAOTipoUsuario();

    /**
     *
     */
    class DAOUsuario extends DataBase
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

        private function construirUsuario($resulset){
            $usuario = new Usuario();
            $jefe = new Usuario();
            foreach ($resulset as $row) {

                $usuario->setIdUsuario($row['id_usuario']);
                $usuario->setDocumento($row['documento']);
                $usuario->setNombres($row['nombres']);
                $usuario->setApellidos($row['apellidos']);
                $usuario->setEmail($row['email']);
                $usuario->setPasswd($row['passwd']);
                $usuario->setActivo((boolean) $row['activo']);

                //metodo para buscar el tipo de usuario
                $DAOTipoUsuario =  new DAOTipoUsuario();
                $tipoUsuario = new TipoUsuario();
                $tipoUsuario->setIdTipoUsuario((int) $row['id_tipo_usuario']);
                $usuario->setTipoUsuario($DAOTipoUsuario->getTipoUsuarioById($tipoUsuario));

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
