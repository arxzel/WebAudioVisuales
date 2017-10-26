<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//controller parametros horarios
	$requires -> importParametroHorarioController(); 

	//controller parametros descansos
	$requires-> importDescansoController();


 ?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title>Parametros Hora</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<header>
			
		</header>

		<section name="ParametrosHorarios">
			
		<fieldset><legend> Parametros Horarios</legend>
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
						<td><input type="datetime" name="dateHoraInicioJornada" value="" /></td>
					</tr>
					<tr>
						<td>Hora Final Jornada: </td>
						<td><input type="datetime" name="dateHorafinalJornada" value="" /></td>		
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

									$parametroHorario = new ParametroHorario();
									//contruccion de objeto (da el nombre)
									$parametroHorario->setNombre($_POST['txtNombre']); 
									//construccion de objeto (da la hora de inicio)
									$parametroHorario->setHoraInicioJornada($_POST['dateHoraInicioJornada']); 
									//contruccion de objeto (da la hora final academica)
									$parametroHorario->setHoraFinalAcademica($_POST['dateHorafinalJornada']); 
									//construccion de objeto (da la duraccion academica)
									$parametroHorario->setDuraciónHoraAcademica($_POST['duraciónHoraAcademica']); 
									//construccion de objeto estado
									$parametroHorario->setEstado($_POST['booleanEstado']);
									$HorafinalJornada = $_POST['dateHorafinalJornada'];
									 //instanció un objeto de tipo parametro tipo controller
									$parametroHorarioController	= new ParametroHorarioController();
									 //le pasa al controlador el objeto tipo parametro horario
									$parametroHorarioController->insertarParametroHorario($parametroHorario);

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
		<section name="Descansos">
			<fieldset><legend>Descansos</legend>
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

									$parametroDescanso = new ParametroDescanso();

									$parametroDescanso ->setNombre($_POST['txtNombreDes']);
									$parametroDescanso ->setHoraInicio($_POST['dateHoraInicio']);
									$parametroDescanso ->setDuracion($_POST['dateDuracion']);
									$parametroDescanso ->setEstado($_POST['booleEstado']);

									$parametroDescanso = new ParametroDescansoController();
									$parametroDescanso -> insertarParametroDescanso($parametroDescanso);
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