<?php
	if(!isset($_GET["id"])) {
		header('Location: ../index.php');
	}
	$codigo = $_GET['id'];

	include_once '../helpers/init.php';
	$sentencia = $bd->prepare("DELETE FROM PrimaryInformationProduct WHERE id=?;");
	$resultado = $sentencia->execute([$codigo]);

	if($resultado) {
		header('Location: ../index.php');
	}else {
		echo "Error";
	}
?>
