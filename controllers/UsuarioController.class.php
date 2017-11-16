<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOUsuario();


class UsuariosController
{
    private $daoUsuario;
    public function __construct()
    {
        $this->daoUsuario = new DAOUsuario();
    }

    public function getUsuarioById($usuario)
    {
        return $this->daoUsuario->getUsuarioById($usuario);
    }

    public function construirUsuario($resulset)
    {
        return $this->daoUsuario->construirUsuario($resulset);
    }
}
