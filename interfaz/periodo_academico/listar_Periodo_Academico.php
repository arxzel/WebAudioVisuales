<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//creacion de controller
	$requires -> importPeriodoAcademicoController();

	$peridoAcademicoController = new PeriodoAcademicoController();

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css"">
	<title>Periodos Académicos</title>
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>	
		</header>
			<section name="PeriodosAcademicos">
				<fieldset class="lPA"><legend>Listar Periodos Académicos</legend>
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Listar Periodos Académicos</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
								    	<th>Nombre</th>
								    	<th>Fecha Inicio</th>
								    	<th>Fecha Final</th>
								    	<th>Estado</th>
								    	<th>Descripción</th>
								    	<th>Operación</th>
								    </tr>
								    <tr>
								    	<th></th>
								    	<th></th>
								    </tr>
								
									<tr>
										<td colspan="2">
											<?php

											$listaPeridoAcademico = $controladorPeridoAcademico -> getAllPeridoAcademico(); 

											foreach ($listaPeridoAcademico as $periodoAcademico) {
												echo "<tr>";

    											echo "<td>".$periodoAcademico->getNombre()."</td>";
    											echo "<td>".$periodoAcademico->getFechaInicio()."</td>";
    											echo "<td>".$periodoAcademico->getFechaFinal()."</td>";
    											echo "<td>".$periodoAcademico->getEstado()."</td>";
    											echo "<td>".$periodoAcademico->getDescripcion()."</td>";

    											echo "<td><a href='editar_periodo_academico.php?idPeriodoAcademico='".$periodoAcademico->getIdPeriodoAcademico().">editar</a>";
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
