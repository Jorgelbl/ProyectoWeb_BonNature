<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM usuarios  WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: Eliminar.php');
	}else{
		header('Location: index.php');
	}
 ?>