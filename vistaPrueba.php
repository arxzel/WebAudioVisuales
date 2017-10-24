<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php'); //llamo la clase que tiene todas las dependencias
$requires = new Requires(); //instancio el objeto de la clase requires que tiene todas las dependencias
$requires -> importUsuarioController(); //llamo la dependencia UsuariosController

echo '<h2>Muesta del recorrido de un objeto mediante :: vista <-> controlador <-> dao <-> dbClass< -> dbEngine</h2>';

$usuario = new Usuario(); //Como UsuariosController tiene Usuario adentro, no necesio llamarlo, e instancio un objeto de tipo usuario
$usuario->setIdUsuario(4); //le asigno como id 1 al usuario por el metodo setIdUsuario
$miUsuariosController = new UsuariosController(); //instancio un objeto de tipo controlador para el usuario
$usuario = $miUsuariosController->getUsuarioById($usuario); //hago la llamada al Controlador, pasando un objeto de tipo usuario.

echo '<h3>Datos del usuario consultado</h3>';
echo '$usuario->getIdUsuario()-> = ', $usuario->getIdUsuario(),'<br>';
echo '$usuario->getDocumento()-> = ', $usuario->getDocumento(),'<br>';
echo '$usuario->getNombres()-> = ', $usuario->getNombres(),'<br>';
echo '$usuario->getApellidos()-> = ', $usuario->getApellidos(),'<br>';
echo '$usuario->getEmail()-> = ', $usuario->getEmail(),'<br>';
echo '$usuario->getPasswd()-> = ', $usuario->getPasswd(),'<br>';
echo '$usuario->getActivo()-> = ', $usuario->getActivo(),'<br>';

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

echo '<br><br>';

echo '<h3>Datos del Tipo De Usuario del jefe usuario consultado</h3>';
echo '--$usuario->getJefe()->getTipoUsuario()->getIdTipoUsuario()-> = ', $usuario->getJefe()->getTipoUsuario()->getIdTipoUsuario(),'<br>';
echo '--$usuario->getJefe()->getTipoUsuario()->getTipoUsuario()-> = ', $usuario->getJefe()->getTipoUsuario()->getTipoUsuario(),'<br>';
echo '--$usuario->getJefe()->getTipoUsuario()->getDescripcion()-> = ', $usuario->getJefe()->getTipoUsuario()->getDescripcion(),'<br>';

echo '<br><br>';


echo '<h3>Y ambien podemos acceder al jefe del jefe</h3>';
echo '--$usuario->getJefe()->getJefe()->getIdUsuario() = ', $usuario->getJefe()->getJefe()->getIdUsuario(),'<br>';
echo '--$usuario->getJefe()->getJefe()->getDocumento() = ', $usuario->getJefe()->getJefe()->getDocumento(),'<br>';
echo '--$usuario->getJefe()->getJefe()->getNombres() = ', $usuario->getJefe()->getJefe()->getNombres(),'<br>';
echo '--$usuario->getJefe()->getJefe()->getApellidos() = ', $usuario->getJefe()->getJefe()->getApellidos(),'<br>';
echo '--$usuario->getJefe()->getJefe()->getEmail() = ', $usuario->getJefe()->getJefe()->getEmail(),'<br>';
echo '--$usuario->getJefe()->getJefe()->getPasswd() = ', $usuario->getJefe()->getJefe()->getPasswd(),'<br>';
echo '--$usuario->getJefe()->getJefe()->getActivo() = ', $usuario->getJefe()->getJefe()->getActivo(),'<br>';
echo '<br><br>... y todos los anteriores métodos, ya que es una tabla recursiva, se podría llegar hasta el último jefe en la cuspide';


 ?>
