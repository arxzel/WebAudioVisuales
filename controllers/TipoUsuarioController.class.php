<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
$requires = new Requires();
$requires->importDAOTipoUsuario();


class TipoUsuarioController
{
    private $daoTipoUsuario;

    public function __construct()
    {
        $this->daoTipoUsuario = new DAOTipoUsuario();
    }

    public function getTipoUsuarioById($tipoUsuario)
    {
        return $this->daoTipoUsuario->getTipoUsuarioById($tipoUsuario);
    }
}
