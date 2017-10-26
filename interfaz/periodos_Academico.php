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
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Periodos Académicos</title>
</head>
	<body>
		<header>
		
		</header>
			<section name="PeriodosAcademicos">
				<fieldset><legend> Periodos Académicos</legend>
					<form method="POST" action="periodo_Academico.php">
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Periodos Académicos</h3></td>
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
										<td><input type="datetime " name="dateFechaFinal"></td>
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
													$periodoAcademico	= new PeriodoAcademicoController();
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
</html>