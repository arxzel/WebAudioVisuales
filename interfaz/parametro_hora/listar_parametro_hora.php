<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//controller parametros horarios
	$requires -> importParametroHorarioController();
	$parametroHorarioController = new ParametroHorarioController();

	//controller parametros descansos
	$requires-> importDescansoController();
	$descansoController = new DescancoController();


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
				<fieldset class="pA"><legend>Parametros Horarios</legend>
					<form method="POST" action="ParametrosHora.php">
						<table border="0" width="550" cellspacing="0" cellpadding="5">
							<thead>
								<tr>
									<th colspan="2"><h3> Listar Parametros Horarios </h3></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Nombre</th>
									<th>Hora Inicio Jornada</th>
									<th>Hora Final Jornada</th>
									<th>Duración Hora Academica</th>
									<th>Estado</th>
																							
								</tr>

								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="2">
										<?php
											$listarParametroHorario = $parametroHorarioController ->getAllParametroHorario();

											foreach ($listarParametroHorario as $parametroHorario) {
												echo "<tr>";

												echo"<tr>".$parametroHorario-> getNombre()."</td>";
												echo"<tr>".$parametroHorario-> getHoraInicioJornada()."</td>";
												echo"<tr>".$parametroHorario-> getHoraFinalJornada()."</td>";
												echo"<tr>".$parametroHorario-> getDuracionAcademica()."</td>";
												echo"<tr>".$parametroHorario-> getEstado()."</td>";

												echo"<td><a href='editar_parametros_hora.php?idParametroHorario='".$parametroHorario -> getIdParametroHorario().">Editar</a>";
												echo "<input type='submit' name='botonEliminar' value='Eliminar'></td>";

												echo "</tr>";

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
									<th colspan="2"><h3>Listar Descansos </h3></th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<th>Nombre</th>
								<th>Hora Inicio</th>
								<th>Duración</th>
								<th>Estado</th>
																									
							</tr>
							<tr>
									<td></td>
									<td></td>
								</tr>
							<tr>
								<td colspan="2">
									<?php

											$listarDescanso = $descansoController ->getAllDescanso();

											foreach ($listarDescanso as $decanso) {
												echo "<tr>";

												echo"<tr>".$decanso-> getNombre()."</td>";
												echo"<tr>".$decanso-> getHoraInicio()."</td>";
												echo"<tr>".$decanso-> getDuracion()."</td>";
												echo"<tr>".$decanso-> getEstado()."</td>";

												echo"<td><a href='editar_parametros_hora.php?idParametroHorario='".$decanso -> getIdParametroHorario().">Editar</a>";
												echo "<input type='submit' name='botonEliminar' value='Eliminar'></td>";

												echo "</tr>";
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
