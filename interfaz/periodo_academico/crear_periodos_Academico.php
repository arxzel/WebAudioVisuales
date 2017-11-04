<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//creacion de controller
	$requires -> importPeriodoAcademicoController();
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css">
	<title>Periodos Académicos</title>
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>	
		</header>
			<section name="PeriodosAcademicos">
				<fieldset class="pA"><legend> Periodos Académicos</legend>
					<form method="POST" action="periodo_Academico.php">
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Crear Periodos Académicos</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
										<td>Nombre: </td>
										<td><input type="text" name="textNombre"></td>
									</tr>
									<tr>
										<td>Fecha Inicio: </td>
										<td><input type="date" name="dateFechaInicio"></td>
									</tr>
									<tr>
										<td>Fecha Final: </td>
										<td><input type="date" name="dateFechaFinal"></td>
									</tr>
									<tr>
										<td>Estado: </td>
										<td><input type="boolean" name="booleanEstado"></td>
									</tr>
									<tr>
										<td>Descripción: </td>
										<td><input type="text" name="textDescripcion"></td>
									</tr>
									<tr>
										<td><input type="submit" name="bootonCancelar" value="Cancelar"></td>
										<td><input type="submit" name="bootonRegistrar" value="Registar"></td>
									</tr>
									<tr>
										<td colspan="2">
											<?php

												if (isset($_POST['bootonRegistrar'])) {

													$periodoAcademico = new PeriodoAcademico();
														//construccion de objetos
													$periodoAcademico->setNombre($_POST['textNombre']);
													$periodoAcademico->setFechaInicio($_POST['dateFechaInicio']);
													$periodoAcademico->setFechaFinal($_POST['dateFechaFinal']);
													$periodoAcademico->setEstado($_POST['booleanEstado']);
													$periodoAcademico->setDescripcion($_POST['textDescripcion']);

													 //instanció un objeto de tipo parametro tipo controller
													$periodoAcademicoController	= new PeriodoAcademicoController();
													 //le pasa al controlador el objeto tipo parametro horario
													$periodoAcademicoController->insertarperiodoAcademico($periodoAcademico);
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
