<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//controller parametros horarios
	//paramtro horario controller 
	$requires -> importParametroHorarioController();

	$parametroHorarioController = new ParametroHorarioController();
	$parametroHorario = new ParametroHorario();

	//----------------------------------------------------------------------------------------------

	//controller parametros descansos
	$requires-> importDescansoController();
	$descansoController = new DescansoController();
	$descanso = new Descanso();

	//---------------------------------------------------------------------------------------------
	//metodo get y set parametro horario

	$parametroHorario -> setId_Parametro_Horario($_GET['idParametroHorario']);
	$parametroHorario = $parametroHorarioController -> getParametroHorarioById($parametroHorario);

	//--------------------------------------------------------------------------------------------
	//metodo get y set descansos

	$descanso -> setId_Descanso($_GET['idDscanso']);
	$descanso = $descansoController -> getDescansoById($descanso);

 ?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>Parametros Hora</title>
		<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css"">
	</head>

	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>	
		</header>
		
		<div class="principal">
			<section name="ParametrosHorarios">
				<fieldset class="pA"><legend> Parametros Horarios</legend>
					<form method="POST" action="ParametrosHora.php">
						<table border="0" width="550" cellspacing="0" cellpadding="5">
							<thead>
								<tr>
									<th colspan="2"><h3>Parametros Horarios </h3></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Nombre: </td>
									<td><input type="txt" name="txtNombre"></td>
								</tr>
								<tr>
									<td>Hora Inicio Jornada: </td>
									<td><input type="time" name="dateHoraInicioJornada" value="" /></td>
								</tr>
								<tr>
									<td>Hora Final Jornada: </td>
									<td><input type="time" name="dateHorafinalJornada" value="" /></td>
								</tr>
								<tr>
									<td>Duración Hora Academica: </td>
									<td><input type="smallint" name="duraciónHoraAcademica" value="" /></td>
								</tr>
								<tr>
									<td>Estado: </td>
									<td><input type="boolean" name="booleanEstado"></td>

								</tr>
								<tr>
									<td><input type="submit" name="botonCancelar" value="Cancelar"></td>
									<td><input type="submit" name="botonRegistrarph" value="Registrar"></td>
								</tr>
								<tr>
									<td colspan="2">
										<?php


											if (isset($_POST['botonRegistrar'])) {

												//contruccion de objeto (da el nombre)
												$parametroHorario->setNombre($_POST['txtNombre']);
												//construccion de objeto (da la hora de inicio)
												$parametroHorario->setHoraInicioJornada($_POST['dateHoraInicioJornada']);
												//contruccion de objeto (da la hora final academica)
												$parametroHorario->setHoraFinalJornada($_POST['dateHorafinalJornada']);
												//construccion de objeto (da la duraccion academica)
												$parametroHorario->setDuracionHoraAcademica($_POST['duraciónHoraAcademica']);
												//construccion de objeto estado
												$parametroHorario->setEstado($_POST['booleanEstado']);
												
												//le pasa al controlador parametro hora
												$parametroHorarioController -> updateParametroHorario($parametroHorario); 


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
		</div>
		<div class="pedre2">
			<section name="Descansos">
				<fieldset class="pA"><legend>Descansos</legend>
					<form method="POST" action="descansos">
						<table border="0" width="550" cellspacing="0" cellpadding="5">
							<thead>
								<tr>
									<th colspan="2"><h3>Descansos </h3></th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td>Nombre: </td>
								<td><input type="txt" name="txtNombreDes"></td>
							</tr>
							<tr>
								<td>Hora Inicio: </td>
								<td><input type="time" name="dateHoraInicio"></td>
							</tr>
							<tr>
								<td>Duración: </td>
								<td><input type="smallint" name="dateDuracion"></td>
							</tr>
							<tr>
								<td>Estado: </td>
								<td><input type="boolean" name="booleEstado"></td>
							</tr>
							<tr>
								<td><input type="submit" name="botonCancelar" value="Cancelar"></td>
								<td><input type="submit" name="botonRegistrarDes" value="Registrar"></td>
							</tr>
							<tr>
								<td colspan="2">
									<?php


										if (isset($_POST['botonRegistrar'])) {

											$parametroDescanso ->setNombre($_POST['txtNombreDes']);
											$parametroDescanso ->setHoraInicio($_POST['dateHoraInicio']);
											$parametroDescanso ->setDuracion($_POST['dateDuracion']);
											$parametroDescanso ->setEstado($_POST['booleEstado']);

											//le pasa al controlador parametro descanso

											$descansoController -> updateDescanso($descanso);
											
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
		</div>
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
