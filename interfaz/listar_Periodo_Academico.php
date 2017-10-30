<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Periodos Académicos</title>
</head>
	<body>
		<header>
			<img src="img/logoUni.png">
			<h1 align="center">Recursos Audiovisuales</h1>	
		</header>
			<section name="PeriodosAcademicos">
				<fieldset class="lPA"><legend>Listar Periodos Académicos</legend>
					<form method="POST" action="periodo_Academico.php"> 
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
								    </tr>
								    <tr>
								    	<th><td><input type="submit" name="bootonResgistrar" value="Registar"></td></th>
								    	<th><td><input type="submit" name="bootonEliminar" value="Eliminar"></td></th>
								    </tr>
								
									<tr>
										<td colspan="2">
											<?php
												//traerme la informacion para la
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
				<td style="text-align: right;"><a href="https://www.facebook.com/UNISANGIL" target="_blank" rel="alternate"><img src="img/facebook.jpg" alt="" height="23" width="23"></a></td>
			</tr>

			<tr>
				<td style="text-align: right;"><a href="https://twitter.com/unisangil" target="_blank" rel="alternate"><img src="img/twitter.png" alt="" height="23" width="23"></a></td>
			</tr>
			<tr>
				<td style="text-align: right;"><a href="https://plus.google.com/+unisangil/posts" target="_blank" rel="alternate"><img src="img/google.png" alt="" height="23" width="23"></a></td>
			</tr>
				
			</tr>
		</tbody>
		</table>
	</footer>
</html>
