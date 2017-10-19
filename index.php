<?php
//require_once ($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/a.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.php');
$requires = new Requires();
$requires -> getRequireControllerUsuarios();

$usuario = new Usuario();
$usuario->setId_usuario(1);
$miUsuariosController = new UsuariosController();
$miUsuariosController->getUsuarioById($usuario);s

 ?>
