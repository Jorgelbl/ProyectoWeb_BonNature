<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM usuarios  ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>Modificar</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<body background="img/Natu.jpg">
	<header>
		<div class="contenedor">
			<div class="logo">
				<h2><center><img src="img/logo2.png"></center></h2>
				<h2><center>BON NATURE</center></h2>		
			</div>	
		</div>
	</header>
	<div class="navegacion">
		<nav>
			<ul class="clearfix">
				<h2><center><li><a href="Modificar.php">ACTUALIZACIÓN DE REGISTROS</a></center></h2>
			</ul>
		</nav>
	</div>

<!--En esta parte comienza el formulario modificar-->

<div class="contenedor">
		<h2>LISTADO DE REGISTROS</h2>
		</div>

		<form action="" method="post">
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Regresar</a>
			</div>
		</form>

		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Telefono</td>
				<td>Direccion</td>
				<td>Correo</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
					<td><?php echo $fila['direccion']; ?></td>
					<td><?php echo $fila['correo']; ?></td>

					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Actualizar</a></td>
				</tr>
			<?php endforeach ?>
		</table>

	</div>

<!--En esta parte termina el formulario agregar-->

	<footer>
		<div class="contenedor">
			<div class="Nosotros">
				<h2>Sobre nosotros</h2>
				<center><p>Somos una Empresa Sustentable</p></center>
			</div>

		</div>
		<p class="copyright">
			JORGE LUIS LUCIANO BENITEZ
		</p>
	</footer>
</body>
</html>