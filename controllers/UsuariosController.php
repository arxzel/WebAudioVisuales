<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.php');
$requires = new Requires();
$this->requires->getRequireDatabase();
$this->requires->getRequireUsuario();


class UsuariosController extends DataBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarioById($usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE id_usuario = " . $usuario->getId_usuario();
        $resulset = $this-> selectQuery($sql);
        foreach ($resulset as $row) {
            echo "<li>{$row['id_usuario']}</li>";
            echo "<li>{$row['nombres']}</li>";
            echo "<li>{$row['apellidos']}</li>";
            echo "<li>{$row['email']}</li>";
        }
    }
}
