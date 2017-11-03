<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//creacion de controller
	$requires -> importParametroReservaController();

	$parametro_Reservas_Controller = new ParametroReservaController();

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css"">
	<title>Parametros Reservas</title>
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>	
		</header>
			<section name="PeriodosAcademicos">
				<fieldset class="lPA"><legend>Listar Parametros Reservas</legend>
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Listar Parametros Reservas</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
								    	<th>Nombre</th>
								    	<th>Dias Mínimos Reserva</th>
								    	<th>Tiempo Mínimo Reserva</th>
								    	<th>Días Máximo Reserva</th>
								    </tr>
								    <tr>
								    	<th></th>
								    	<th></th>
								    </tr>
								
									<tr>
										<td colspan="2">
											<?php

											$listarParametroReserva = $controladorParametroReserva -> getAllParametroReserva(); 

											foreach ($listarParametroReserva as $parametroReserva) {
												echo "<tr>";

    											echo "<td>".$parametroReserva->getNombre()."</td>";
    											echo "<td>".$parametroReserva->getDiasMinimoReserva()."</td>";
    											echo "<td>".$parametroReserva->getFTiempoMinimoReserva()."</td>";
    											echo "<td>".$parametroReserva->getDiasMaximoReserva()."</td>";
    											

    											echo "<td><a href='editar_parametros_reservas.php?idParametro='".$parametroReserva->getIdParametro().">editar</a>";
												echo "<input type='submit' name='bootonEliminar' value='Eliminar'></td>";
    											echo "</tr>";
											}
												
											?>

										</td>
									</tr>
								</tbody>
						</table>
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
