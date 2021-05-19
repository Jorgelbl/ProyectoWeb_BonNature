<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$correo=$_POST['correo'];


		if(!empty($nombre) && !empty($telefono) && !empty($direccion) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO usuarios(nombre,telefono,direccion,correo) VALUES(:nombre,:telefono,:direccion,:correo)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':telefono' =>$telefono,
					':direccion' =>$direccion,
					':correo' =>$correo

				));
				header('Location: Agregar.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Usuario</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<body background="img/Hojas.jpg">
	<div class="contenedor">
		<h2>AGREGAR REGISTRO</h2>

		<form action="" method="post">

			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="direccion" placeholder="Direccion" class="input__text">
				<input type="text" name="correo" placeholder="Correo" class="input__text">
			</div>

			<div class="btn__group">
				<a href="Agregar.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>

	</div>
</body>
</html>
