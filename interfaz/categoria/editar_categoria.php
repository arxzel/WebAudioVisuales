<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/WebAudioVisuales/requires.class.php');
    $requires = new Requires();
    $requires -> importCategoriaController();

    $categoriaController = new CategoriaController();
    $categoria = new Categoria();
    $usuario = new Usuario();
    $usuario->setIdUsuario(1);
    //para que no salge error hay q enviarle un parametro al método. $_GET['idCategoria'] aún no está definido y por eso envía error
    $categoria->setIdCategoria($_GET['idCategoria']);
    $categoria = $categoriaController -> getCategoriaById($categoria);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/../WebAudioVisuales/interfaz/style.css">
	<title>Categoría</title>
	<meta name="viewport" content="width=device-width">
</head>
	<body>
		<header>
			<img src="/../WebAudioVisuales/interfaz/img/logoUni.png">
			<h1 align="center">Categoría</h1>
		</header>

			<section name="ParametroReserva" class="categoriaController">
				<fieldset class="pRF"><legend style="font-weight:bold"> Categoría</legend>
				<form method="POST">
					<table>
						<thead>
							<tr>
								<td colspan="2"><h3>Editar Categoría</h3></td>
							</tr>
						</thead>
							<tbody>
								<tr>
									<td>Categoría: </td>
									<td><input type="text" name="txtCategoria" value="<?php echo $categoria->getcategoria();?>"></td>
								</tr>
								<tr>
									<td>Descripción: </td>
									<td><input type="text" name="txtCategoria" value="<?php echo $categoria->getdescripcion();?>"></td>
								</tr>
								<tr>
									<td><input type="button" name="bootonCancelar" onclick="window.history.go(-1);" value="Cancelar"></td>
									<td><input type="submit" name="bootonResgistrar" value="Aceptar"></td>
								</tr>
								
								<tr>
									<td colspan="2">
									<?php

	                                    if (isset($_POST['bootonResgistrar'])) {

	                                        //construccion de objetos
	                                        $categoria->setcategoria($_POST['txtCategoria']);
	                                        $categoria->setdescripcion($_POST['txtCategoria']);
	                                        $categoriaController->updateCatergoria($categoria, $usuario);
	                                        //instanció un objeto de tipo categoria

                                             header('Location:listar_categoria.php');
                                             //header("Location:javascript://history.go(-2)");

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
