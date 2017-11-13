<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//creacion de controller
	$requires -> importParametroReservaController();

	$parametroReservasController = new ParametroReservaController();


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css"">
	<title>Parametros Reservas</title>
	<script type="text/javascript">
		function estaSeguro(){
			a = confirm("¿Esta seguro que desea eliminar el parámetro?");
			return a;
		}
	</script>
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
								    	<th>Opciones</th>
								    </tr>
															
									<tr>
										<td colspan="2">
											<?php

											$listarParametrosReserva = $parametroReservasController -> getAllParametrosReserva(); 
											
												foreach ($listarParametrosReserva as $parametroReserva) {
													echo "<tr>";
	    											echo "<td>".$parametroReserva->getNombre()."</td>";
	    											echo "<td>".$parametroReserva->getDiasMinimos()."</td>";
	    											echo "<td>".$parametroReserva->getTiempoMinimo()."</td>";
	    											echo "<td>".$parametroReserva->getDiasMaximo()."</td>";
	    											

	    											echo "<td><a href='editar_parametros_reservas.php?idParametro=".$parametroReserva->getIdParametroReserva()."'>editar</a>";
	    											
													echo "<form onsubmit='return estaSeguro()' action='../../controllers/ParametroReservaController.class.php' >
													<input type='hidden' name='idParametro' value=".$parametroReserva->getIdParametroReserva().">
													<input type='submit' name='boton' value='Eliminar'></form></td>";
	    											echo "</tr>";

												}
											?>

										</td>
									</tr>
								</tbody>
						</table>
						<a href="crear_parametros_reservas.php">Crear Nuevo Parámetro</a>
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
