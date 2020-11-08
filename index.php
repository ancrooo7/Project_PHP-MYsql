<?php
	include_once 'helpers/init.php';
	
	#----------------------------------Paginación-------------------------------------
	
	$tamagno_pagina = 10;

	$pagina_actual = 1;
	$inicio = 0;

	if(isset($_GET["pagina"])) {
		$pagina_actual = $_GET["pagina"];
		$inicio = ($pagina_actual - 1)*$tamagno_pagina;
	}

	$ssql = "SELECT * FROM PrimaryInformationProduct";
	$rs = $bd->prepare($ssql);
	$rs->execute();
	$num_total_registros = $rs->rowCount();	

	$total_paginas = ceil($num_total_registros / $tamagno_pagina); 

	$ssql = "SELECT * FROM PrimaryInformationProduct LIMIT ".$inicio.",".$tamagno_pagina;
	$rs = $bd->prepare($ssql);
	$rs->execute();
	$datosProductos = $rs->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
	<link rel="stylesheet" type="text/css" href="assets/styleIndex.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="registers">
		<div class="pagination-insert">
			<div>
				<button class="primarys-pdf">
					<a href="views/sub-views/primarysPdf.php">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  							<path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
						</svg>
					</a>
				</button>
				<button class="btn-show btn-primary">Insertar registro</button>
			</div>
			<div>
			<?php
				if ($total_paginas > 1){ 
    				for ($i=1;$i<=$total_paginas;$i++){ 
       					if ($pagina_actual == $i) 
          					echo $pagina_actual . ""; 
       					else 	
       						echo "<a class='links' href='index.php?pagina=". $i ."'>".$i."</a>";
    				}	 
				}
			?>
			</div>
		</div>
		<table class="table table-striped">
			<tr>
				<th>Nombre</th>
				<th>Código de proveedor</th>
				<th>Código de barras</th>
				<th>Stock</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<?php foreach($datosProductos as $dato): ?>
			<tr>
				<td><?php echo $dato->Nombre; ?></td>
				<td><?php echo $dato->Codigo_de_proveedor; ?></td>
				<td><?php echo $dato->Codigo_de_barras; ?></td>
				<td><?php echo $dato->Stock; ?></td>
				<td><a href="views/sub-views/edit.php?id=<?php echo $dato->id; ?>">Editar</a></td>
				<td><a href="process/remove.php?id=<?php echo $dato->id; ?>">Eliminar</a></td>
				<td>
					<a href="views/sub-views/graph.php">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-graph-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  							<path d="M0 0h1v16H0V0zm1 15h15v1H1v-1z"/>
							<path fill-rule="evenodd" d="M14.39 4.312L10.041 9.75 7 6.707l-3.646 3.647-.708-.708L7 5.293 9.959 8.25l3.65-4.563.781.624z"/>
  							<path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4h-3.5a.5.5 0 0 1-.5-.5z"/>
						</svg>
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="hidden">
		<button class="close-show">
			<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  				<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
  				<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
			</svg>
		</button>
		<form class="form-insert" method="POST" action="process/insert.php">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="txtNombre"></td>
				</tr>
				<tr>
					<td>Código de proveedor</td>
					<td><input type="text" name="txtProveedor"></td>
				</tr>
				<tr>
					<td>Código de Barras</td>
					<td><input type="text" name="txtBarras"></td>
				</tr>
				<tr>
					<td>Stock</td>
					<td><input type="text" name="txtStockM"></td>
				</tr>
				<tr>
					<td><input class="btn-secondary" style="width: 100%" type="reset" value="Borrar"></td>
					<td><input class="btn-hidden btn-success" style="width: 100%" type="submit" value="Insertar"></td>
				</tr>
				<input type="hidden" name="oculto">
			</table>
		</form>
	</div>
	<script type="text/javascript" src="assets/windowInsert.js"></script>
</body>
</html>
