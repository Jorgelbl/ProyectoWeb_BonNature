<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM usuarios WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$correo=$_POST['correo'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($telefono) && !empty($direccion) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE usuarios SET  
					nombre=:nombre,
					telefono=:telefono,
					direccion=:direccion,
					correo=:correo
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':telefono' =>$telefono,
					':direccion' =>$direccion,
					':correo' =>$correo,
					':id' =>$id
				));
				header('Location: Modificar.php');
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
	<title>Modificar Usuario</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<body background="img/Hojas.jpg">
	<div class="contenedor">
		<h2>MODIFICAR REGISTRO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
			</div>

			<div class="btn__group">
				<a href="Modificar.php" class="btn btn__danger">Regresar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>

	</div>
</body>
</html>
