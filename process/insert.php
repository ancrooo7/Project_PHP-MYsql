<?php
	if(!isset($_POST['oculto'])){
		header('Location: ../index.php');
	}

	include_once '../helpers/init.php';

	$nombre = $_POST['txtNombre'];
	$proveedor = $_POST['txtProveedor'];
	$barras = $_POST['txtBarras'];
	$stockM = $_POST['txtStockM'];

	if(comparePWB($barras, $proveedor) && controlDigit($barras)){
		$sentencia_1 = $bd->prepare("INSERT INTO PrimaryInformationProduct(Nombre, Codigo_de_proveedor, Codigo_de_barras, Stock) VALUES (?,?,?,?);");
		$sentencia_2 = $bd->prepare("INSERT INTO SecondaryInformationProduct(Codigo_de_barras, Stock) VALUES (?,?);");

		
		$resultado_1 = $sentencia_1->execute([$nombre, $proveedor, $barras, $stockM]);	
		$resultado_2 = $sentencia_2->execute([$barras, $stockM]);

		if ($resultado_1 && $resultado_2) {
			header('Location: ../index.php');
		}else {
			echo "Error";
		}	
	}else {
		header('Location: ../errors/errorInCodBarras.php');
	}

	
?>
