<?php
	if(!isset($_POST['oculto'])) {
		header('Location: ../index.php');
	}
	include_once '../helpers/init.php';
	$id = $_POST['id'];
	$nombre = $_POST['txtNombre'];
	$proveedor = $_POST['txtProveedor'];
	$barras = $_POST['txtBarras'];
	$stock = $_POST['txtStockM'];
	#$check = $_POST['check'];

	if(comparePWB($barras, $proveedor) && controlDigit($barras)){

		$sentencia_1 = $bd->prepare("UPDATE PrimaryInformationProduct SET Nombre=?, Codigo_de_proveedor=?, Codigo_de_barras=?, Stock=? WHERE id=?;");
		$sentencia_2 = $bd->prepare("INSERT INTO SecondaryInformationProduct(Codigo_de_barras, Stock) VALUES (?,?);");
		#$sentencia_3 = $bd->prepare("UPDATE PrimaryInformationProduct SET Nombre=?, Codigo_de_proveedor=?, Codigo_de_barras=? WHERE id=?;");

		/*
		if (isset($check) && $check == 'Yes') {
			$resultado_1=$sentencia_1->execute([$nombre, $proveedor, $barras, $stock, $id]);		
		} else {
			$resultado_1=$sentencia_3->execute([$nombre, $proveedor, $barras, $id]);	
		}
		*/
		
		$resultado_1=$sentencia_1->execute([$nombre, $proveedor, $barras, $stock, $id]);
		$resultado_2=$sentencia_2->execute([$barras, $stock]);

		if($resultado_1 && $resultado_2) {
			header('Location: ../index.php');
		}else {
			echo "error";
		}
	}else {
		header('Location: ../errors/errorInCodBarras.php');
	}

?>
