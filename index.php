<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php'); //llamo la clase que tiene todas las dependencias
$requires = new Requires(); //instancio el objeto de la clase requires que tiene todas las dependencias
$requires -> getRequireUsuarioController(); //llamo la dependencia UsuariosController

echo '<h1>Muesta del recorrido vista->controlador->dao->dbClass->dbEngine</h1>';

$usuario = new Usuario(); //Como UsuariosController tiene Usuario adentro, no necesio llamarlo, e instancio un objeto de tipo usuario
$usuario->setIdUsuario(4); //le asigno como id 1 al usuario por el metodo setIdUsuario
$miUsuariosController = new UsuariosController(); //instancio un objeto de tipo controlador para el usuario
$usuario = $miUsuariosController->getUsuarioById($usuario); //hago la llamada al Controlador, pasando un objeto de tipo usuario.

echo '<h3>Datos del usuario consultado</h3>';
echo 'getIdUsuario()-> = ', $usuario->getIdUsuario(),'<br>';
echo 'getDocumento()-> = ', $usuario->getDocumento(),'<br>';
echo 'getNombres()-> = ', $usuario->getNombres(),'<br>';
echo 'getApellidos()-> = ', $usuario->getApellidos(),'<br>';
echo 'getEmail()-> = ', $usuario->getEmail(),'<br>';
echo 'getPasswd()-> = ', $usuario->getPasswd(),'<br>';
echo 'getActivo()-> = ', $usuario->getActivo(),'<br>';

echo '<br><br>';

echo '<h3>Datos del Tipo De Usuario del usuario consultado</h3>';
echo 'getTipoUsuario()-> = Es un objeto de tipo TipoUsuario así que puedo acceder a sus métodos<br>';
echo '--$usuario->getTipoUsuario()->getIdTipoUsuario()-> = ', $usuario->getTipoUsuario()->getIdTipoUsuario(),'<br>';
echo '--$usuario->getTipoUsuario()->getTipoUsuario()-> = ', $usuario->getTipoUsuario()->getTipoUsuario(),'<br>';
echo '--$usuario->getTipoUsuario()->getDescripcion()-> = ', $usuario->getTipoUsuario()->getDescripcion(),'<br>';

echo '<br><br>';

echo '<h3>Datos del Jefe del usuario consultado</h3>';
echo 'getJefe()-> = Es un objeto de tipo Usuario (Esta tabla es recursiva) así que puedo acceder a sus métodos<br>';
echo '--$usuario->getJefe()->getIdUsuario() = ', $usuario->getJefe()->getIdUsuario(),'<br>';
echo '--$usuario->getJefe()->getDocumento() = ', $usuario->getJefe()->getDocumento(),'<br>';
echo '--$usuario->getJefe()->getNombres() = ', $usuario->getJefe()->getNombres(),'<br>';
echo '--$usuario->getJefe()->getApellidos() = ', $usuario->getJefe()->getApellidos(),'<br>';
echo '--$usuario->getJefe()->getEmail() = ', $usuario->getJefe()->getEmail(),'<br>';
echo '--$usuario->getJefe()->getPasswd() = ', $usuario->getJefe()->getPasswd(),'<br>';
echo '--$usuario->getJefe()->getActivo() = ', $usuario->getJefe()->getActivo(),'<br>';
echo '... y todos los anteriores métodos, ya que es una tabla recursiva, se podría llegar hasta el último jefe en la cuspide';


 ?>
