<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
    $requires = new Requires();
    $requires -> importParametroReservaController();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Parametros Reservas</title>
</head>
	<body>
		<header>

		</header>
		<section name="ParametroReserva">
			<fieldset class="pRF"><legend> Parametros Reserva</legend>
			<form method="POST" action="parametros_Reservas.php">
				<table>
					<thead>
						<tr>
							<td colspan="2"><h3>Parametros Reserva</h3></td>
						</tr>
					</thead>
						<tbody>
							<tr>
								<td>Nombre: </td>
								<td><input type="text" name="txtNombreR"></td>
							</tr>
							<tr>
								<td>Dias Mínimos Reservas: </td>
								<td><input type="smallint" name="smallintDiasMinimosReserva"></td>
							</tr>
							<tr>
								<td>Tiempo Mínimo Reserva: </td>
								<td><input type="time" name="timeTiempoMinimoReserva"></td>
							</tr>
							<tr>
								<td>Dias Máximo Reservas: </td>
								<td><input type="smallint" name="smallintDiasMaximoReserva"></td>
							</tr>
							<tr>
								<td>Tiempo Máximo Reserva: </td>
								<td><input type="time" name="timeTiempoMaximoReserva"></td>
							</tr>
							<tr>
								<td>Estado: </td>
								<td><input type="boolean" name="booleanEstado"></td>
							</tr>
							<tr>
								<td><input type="submit" name="bootonCancelar" value="Cancelar"></td>
								<td><input type="submit" name="bootonResgistrar" value="Registar"></td>
							</tr>
							<tr>
								<td colspan="2">
								<?php

                                    if (isset($_POST['botonRegistrar'])) {
                                        $parametroReserva = new ParametroReserva();
                                        //construccion de objetos
                                        $parametroReserva->setNombre($_POST['txtNombreR']);
                                        $parametroReserva->setDiasMinimoReserva($_POST['smallintDiasMinimosReserva']);
                                        $parametroReserva->setTiempoMinimoReserva($_POST['timeTiempoMinimoReserva']);
                                        $parametroReserva->setDiaMaximoReserva($_POST['smallintDiasMaximoReserva']);
                                        $parametroReserva->setTiempoMaximoReserva($_POST['timeTiempoMaximoReserva']);
                                        $parametroReserva->setEstado($_POST['booleanEstado']);
                                        //instanció un objeto de tipo parametro tipo controller
                                        $$parametroReservaController = new ParametroReservaController();
                                        //le pasa al controlador el objeto tipo parametro horario
                                        $parametroReservaController->insertarParametroReserva($parametroReserva);
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
</html>
