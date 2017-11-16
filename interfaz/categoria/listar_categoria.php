<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
	$requires = new Requires();

	//creacion de controller
	$requires -> importCategoriaController();

	$CategoriaController = new CategoriaController();


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css">
	<title>Categoría</title>
	<script type="text/javascript">
		function estaSeguro(){
			a = confirm("¿Esta seguro que desea eliminar la categoría?");
			return a;
		}
	</script>
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Categoría</h1>
		</header>
			<section name="PeriodosAcademicos">
				<fieldset class="lPA"><legend>Listar Categoría</legend>
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Listar Categoría</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
								    	<th>Categoría</th>
								    	<th>Descripción</th>
								    </tr>

											<?php

											$listarCategoria = $parametroCategoriaController -> getAllCategoria();

												foreach ($listarCategoria as $parametroCategoria) {
													echo "<tr>";
	    											echo "<td>".$parametroCategoria->getcategoria()."</td>";
	    											echo "<td>".$parametroCategoria->getdescripcion()."</td>";
	    											

	    											echo "<td><a href='editar_categoria.php?idCategoria=".$parametroCategoria->getIdCategoria()."'>editar</a>";

													echo "<form onsubmit='return estaSeguro()' action='#' method ='POST' >
													<input type='hidden' name='idCategoria' value=".$parametroCategoria->getIdCategoria().">
													<input type='submit' name='boton' value='Eliminar'></form></td>";
	    											echo "</tr>";

												}
												if(isset($_POST["idCategoria"]))
											    {
											       $miCategoriaController = new CategoriaController();
											       $miCategoria = new Categoria();
											       $miUsuario = new Usuario();
											       //El id del usuario puede ser cualquiera ya que no hemos llegado a ese módulo.
											       $miUsuario->setIdUsuario(1);
											       $miCategoria->setIdCategoria($_POST["idCategoria"]);
											       echo $miUsuario->getIdUsuario();
											       echo $miCategoria->getIdCategoria();
											       echo $miCategoriaController->test();
											       $miCategoriaController->deleteCategoria($miCategoria,$miUsuario);
											       header("Location: http://localhost/WebAudioVisuales/interfaz/parametro_Reserva/listar_categoria.php");
											   }
											?>
								<tr>
									<td>
										<a href="crear_categoria.php"> Crear Nuevo</a>
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
