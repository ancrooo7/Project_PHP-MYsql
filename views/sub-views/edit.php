<?php
	if(!isset($_GET['id'])) {
		header('Location: ../../index.php');
	}
	include '../../helpers/init.php';
	$id = $_GET['id'];
	$sentencia = $bd->prepare('SELECT * FROM PrimaryInformationProduct WHERE id=?;');
	$sentencia->execute([$id]);
	$dato = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="../../assets/styleEdit.css">
	<link rel="urban roostersstylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form method="POST" action="../../process/editProcess.php">
		<button class="btn-back">
			<a href="../../index.php">
				<svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  					<path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 	0-.708l3-3a.5.5 0 0 1 .708 0z"/>
  					<path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
				</svg>
			</a>
		</button>
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="txtNombre" value="<?php echo $dato->Nombre; ?>"></td>
			</tr>
			<tr>
				<td>Código de Proveedor</td>
				<td><input type="text" name="txtProveedor" value="<?php echo $dato->Codigo_de_proveedor; ?>"></td>
			</tr>
			<tr>
				<td>Código de barras</td>
				<td><input type="text" name="txtBarras" value="<?php echo $dato->Codigo_de_barras; ?>"></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td>
					<input type="text" name="txtStockM" value="<?php echo $dato->Stock; ?>">
					<!--	<input type="checkbox" name="check" value="Yes">	-->
				</td>
			</tr>
			<tr>
				<td><input type="hidden" name="oculto"><input type="hidden" name="id" value="<?php echo $dato->id ?>"></td>
				<td><input class="btn-primary" type="submit" value="EDITAR"></td>
			</tr>
		</table>
	</form>
</body>
</html>
