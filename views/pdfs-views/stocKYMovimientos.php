<?php
	include_once '../../assets/TCPDF/tcpdf.php';
	include_once '../../helpers/init.php';
	

	$ssql = "SELECT * FROM PrimaryInformationProduct";
    $rs = $bd->prepare($ssql);
    $rs->execute();
    $datosProductos = $rs->fetchAll(PDO::FETCH_OBJ);

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->SetAuthor('Andrés Crespi');
	$pdf->SetTitle('stocKYMovimientos');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	$pdf->AddPage('P', 'A4');

	$pdf->SetFont('helvetica', 'B', 20);

	$pdf->Write(0, 'Stock', '', 0, 'L', true, 0, false, false, 0);

	$pdf->SetFont('helvetica', '', 12);

	ob_start();
	?>	
		<table border="1" cellpadding="2" cellspacing="2" align="center">
 			<tr nobr="true">
  				<th colspan="2"><?php echo date("d\/m\/Y");?></th>
 			</tr>
 			<tr nobr="true">
  				<td>Nombre</td>
  				<td>Cantidad</td>
		 	</tr>
		 	<?php foreach ($datosProductos as $value): ?>
 			<tr nobr="true">
  				<td><?php echo $value->Nombre; ?></td>
  				<td><?php echo $value->Stock; ?></td>
 			</tr>
 			<?php endforeach; ?>
		</table>
	<?php
	$tbl=ob_get_clean();

	$pdf->writeHTML($tbl, true, false, false, false, '');

	$pdf->AddPage('L', 'A4');

	$ssql = "SELECT Nombre, Codigo_de_barras FROM PrimaryInformationProduct";
	$ssql_1 = "SELECT * FROM SecondaryInformationProduct";
    $rs = $bd->prepare($ssql);
    $rs_1 = $bd->prepare($ssql_1);
    $rs->execute();
    $rs_1->execute();
    $datosProductos = $rs->fetchAll(PDO::FETCH_OBJ);	
    $datosProductos_1 = $rs_1->fetchAll(PDO::FETCH_OBJ);	

	$pdf->SetFont('helvetica', 'B', 20);

	$pdf->Write(0, 'Movimientos', '', 0, 'L', true, 0, false, false, 0);

	$pdf->SetFont('helvetica', '', 12);

	ob_start();
	?>	
		<table border="1" cellpadding="2" cellspacing="2" align="center">
		 	<?php foreach ($datosProductos as $value): ?>
 			<tr nobr="true">
 				<th colspan="10">
 					<?php echo $value->Nombre ?>
 				</th>
 			</tr>
 			<tr nobr="true">
  					<?php 
  						foreach ($datosProductos_1 as $value_1) {
  							if ($value->Codigo_de_barras == $value_1->Codigo_de_barras) {
  								?> <td><?php echo $value_1->Stock; ?></td> <?php
  							}
  						}
  					?>
 			</tr>
 			<?php endforeach; ?>
		</table>
	<?php
	$tbl=ob_get_clean();

	$pdf->writeHTML($tbl, true, false, false, false, '');

	$pdf->Output('stocKYMovimientos', 'I');
?>
