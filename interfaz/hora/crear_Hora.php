<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//creacion de controller
	$requires -> importHoraController();

	$horaController = new HoraController();
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css">
	<title>Horas</title>
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>	
		</header>
			<section name="PeriodosAcademicos">
				<fieldset class="pA"><legend>Crear Horas</legend>
					<form method="POST" action="periodo_Academico.php">
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Crear Horas</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
										<td>Hora Inicio Jornada: </td>
										<td>Hora Final Jornada: </td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>
									<tr>
										<td><input type="time" name="timeHora"></td>
										<td><input type="time" name="timeHora"></td>
									</tr>

									<tr>
										<td><input type="submit" name="bootonCancelar" value="Cancelar"></td>
										<td><input type="submit" name="bootonRegistrar" value="Registar"></td>
									</tr>

									<tr>
										<td colspan="2">
											<?php

												$hora = new Hora();
												//contruccion de objeto (da el hora)

												$hora->setHora($_POST['timeHora']);
												
												//instanció un objeto de tipo hora tipo controller
												$horaController	= new HoraController();

												

												
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