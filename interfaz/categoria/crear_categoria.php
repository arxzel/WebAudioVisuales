<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
    $requires = new Requires();
    $requires -> importCategoriaController();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css">
	<title>Categoría</title>
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Sistema De Administración De Recursos Audiovisuales</h1>
			<h1 align="center">SARA</h1>	
		</header>
			<section name="Categorías">


				<fieldset class="pA"><legend>Crear Categoría</legend>
					<form method="POST" action="#">
						<table>
							<thead>
								<tr>
									<td colspan="2"><h3>Crear Categoría</h3></td>
								</tr>
							</thead>
								<tbody>
									<tr>
										<td> Categoría: </td>
										<td><input type="text" name="txtCategoria"> </td>
									</tr>
									<tr>
										<td> Descripción: </td>
										<td><input type="text" name="txtDescrip"></td>
									</tr>
									
									<tr>
										<td><input type="button" value="Cancelar" onclick="window.history.go(-1);"></td>
										<td><input type="submit" name="bootonRegistrar" value="Registar"></td>
									</tr>

									<tr>
										<td colspan="2">
											<?php

									if (isset($_POST['bootonResgistrar'])) {
                                        if (
                                            !is_null($_POST['txtCategoria']) &&
                                            !is_null($_POST['txtDescrip'])
                                           
                                        ) {
                                            $categoria = new Categoria();
                                            //construccion de objetos
                                            $categoria->setcategoria($_POST['txtCategoria']);
                                            $categoria->setdescripcion($_POST['txtDescrip']);
                                            
                                            //instanció un objeto de tipo parametro tipo controller
                                            $categoriaController = new CategoriaController();
                                            //le pasa al controlador el objeto tipo parametro horario
                                            $categoriaController->insertCategoria($categoria);

                                            //Falta crear la condicción si esta seguro o desea cancelarlo.
                                            //Falta el aviso cuando registre en la db o si hay algún problema.
                                            header("Location: listar_categoria.php");
                                            //echo "<script type=\"text/javascript\">history.go(-2);</script>";
                                            //exit;
                                        }
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