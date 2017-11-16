<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();
	$requires ->importHora();

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
					<form method="POST" action="#">
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Crear Horas</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
										<th> # </th>
										<th> Inicio: </th>
										<th> Final: </th>
									</tr>
									<?php

										for($i=1;$i<3;$i++){

											echo "<tr>
											<td style='text-align: center;'><b>".$i."</b></td>
										<td><input type='time' name='timeHora".$i."'></td>
										<td><input type='time' name='timeHoraF".$i."'></td>
												</tr>";
										}
									?>
									
									
									<tr>
										<td><input type="submit" name="bootonCancelar" value="Cancelar"></td>
										<td><input type="submit" name="bootonRegistrar" value="Registar"></td>
									</tr>

									<tr>
										<td colspan="2">
											<?php

												$horas =  [];
												
												//contruccion de objeto (da el hora)
												if(isset($_POST['bootonRegistrar'])){
													for($i=1;$i<3;$i++){
														$hora = new Hora();
														
														$hora->setHora($_POST['timeHora'.$i]);
														array_push ( $horas , $hora );
														echo $horas[$i-1]->getHora();
														//para que al final tome la última hora
														if($i==2){
															$hora = new Hora();
															$hora->setHora($_POST['timeHoraF'.$i]);
														array_push ( $horas , $hora );
														echo $horas[$i]->getHora();
														}
													}

													//$hora->setHora($_POST['timeHora']);
												
												//instanció un objeto de tipo hora tipo controller
												$horaController	= new HoraController();
												$horaController->insertHoras($horas);
												}
													if(isset($_POST['bootonCancelar'])){
														header('Location: http://localhost/WebAudioVisuales/interfaz/hora/crear_Hora.php');
													}
												

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