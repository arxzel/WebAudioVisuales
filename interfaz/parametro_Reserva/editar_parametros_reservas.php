<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
    $requires = new Requires();
    $requires -> importParametroReservaController();
    $parametroReservaController = new ParametroReservaController();
    $parametroReserva = new ParametroReserva();
    $usuario = new Usuario();
    $usuario->setIdUsuario(1);
    //para que no salge error hay q enviarle un parametro al método. $_GET['idParametroReserva'] aún no está definido y por eso envía error
    $parametroReserva->setIdParametroReserva($_GET['idParametro']);
    $parametroReserva = $parametroReservaController -> getParametroReservaById($parametroReserva);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css">
	<title>Parametros Reservas</title>
	<meta name="viewport" content="width=device-width">
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>
		</header>

			<section name="ParametroReserva" class="parametroReserva">
				<fieldset class="pRF"><legend style="font-weight:bold"> Parametros Reserva</legend>
				<form method="POST">
					<table>
						<thead>
							<tr>
								<td colspan="2"><h3>Editar Parametros Reserva</h3></td>
							</tr>
						</thead>
							<tbody>
								<tr>
									<td>Nombre: </td>
									<td><input type="text" name="txtNombreR" value="<? echo $parametroReserva->getNombre();?>"></td>
								</tr>
								<tr>
									<td>Dias Mínimos Reservas: </td>
									<td><input type="number" name="smallintDiasMinimosReserva" value="<? echo $parametroReserva->getDiasMinimos();?>"></td>
								</tr>
								<tr>
									<td>Tiempo Mínimo Reserva: </td>
									<td><input type="time" name="timeTiempoMinimoReserva" value="<? echo $parametroReserva->getTiempoMinimo();?>"></td>
								</tr>
								<tr>
									<td>Dias Máximo Reservas: </td>
									<td><input type="number" name="smallintDiasMaximoReserva" value="<? echo $parametroReserva->getDiasMaximo();?>"></td>
								</tr>
								<tr>
									<td>Tiempo Máximo Reserva: </td>
									<td><input type="time" name="timeTiempoMaximoReserva" value="<? echo $parametroReserva->getTiempoMaximo();?>"></td>
								</tr>
								<tr>
									<td>Estado: </td>
									<td><input type="boolean" name="booleanEstado" value="<? echo $parametroReserva->getEstado();?>"></td>
								</tr>
								<tr>
									<td><input type="button" name="bootonCancelar" onclick="window.history.go(-1);" value="Cancelar"></td>
									<td><input type="submit" name="bootonResgistrar" value="Aceptar"></td>
								</tr>
								<tr>
									<td colspan="2">
									<?php

	                                    if (isset($_POST['bootonResgistrar'])) {

	                                        //construccion de objetos
	                                        $parametroReserva->setNombre($_POST['txtNombreR']);
	                                        $parametroReserva->setDiasMinimos($_POST['smallintDiasMinimosReserva']);
	                                        $parametroReserva->setTiempoMinimo($_POST['timeTiempoMinimoReserva']);
	                                        $parametroReserva->setDiasMaximo($_POST['smallintDiasMaximoReserva']);
	                                        $parametroReserva->setTiempoMaximo($_POST['timeTiempoMaximoReserva']);
	                                        $parametroReserva->setEstado($_POST['booleanEstado']);
                                            $parametroReservaController->updateParametroReserva($parametroReserva, $usuario);
	                                        //instanció un objeto de tipo parametro tipo controller

                                             header('Location:listar_parametros_reservas.php');
                                             //header("Location:javascript://history.go(-2)");

	                                    }
	                                    //Falta crear la condicción si esta seguro o desea cancelarlo.
	                                    //Falta el aviso cuando registre en la db o si hay algún problema.
	                                ?>
									</td>
								</tr>

							</tbody>
						</table>
					</form>
				</fieldset>
			</section>
		</body>
	<footer>
		<table align="right" class="redes">
		<tbody>
			<tr>
				<td style="text-align: right;"><a href="https://www.facebook.com/UNISANGIL" target="_blank" rel="alternate"><img src="/../WebAudioVisuales/interfaz/img/facebook.jpg" alt="" height="23" width="23"></a></td>
			</tr>

			<tr>
				<td style="text-align: right;"><a href="https://twitter.com/unisangil" target="_blank" rel="alternate"><img src="/../WebAudioVisuales/interfaz/img/twitter.png" alt="" height="23" width="23"></a></td>
			</tr>
			<tr>
				<td style="text-align: right;"><a href="https://plus.google.com/+unisangil/posts" target="_blank" rel="alternate"><img src="/../WebAudioVisuales/interfaz/img/google.png" alt="" height="23" width="23"></a></td>
			</tr>

			</tr>
		</tbody>
		</table>
	</footer>
</html>
