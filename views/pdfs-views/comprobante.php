<?php
	include_once '../../assets/TCPDF/tcpdf.php';
	include_once '../../helpers/init.php';
	

	$ssql = "SELECT * FROM PrimaryInformationProduct";
    	$rs = $bd->prepare($ssql);
    	$rs->execute();
    	$datosProductos = $rs->fetchAll(PDO::FETCH_OBJ);

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	$pdf->SetAuthor('Andrés Crespi');
	$pdf->SetTitle('Comprobante');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	$pdf->AddPage();

	$pdf->SetFont('helvetica', '', 12);

	ob_start();
	?>	
		<table border="1" cellpadding="2" cellspacing="2" align="center">
 			<tr nobr="true">
  				<th colspan="3">1<br/>A999999991199999999</th>
 			</tr>
 			<tr nobr="true">
  				<th colspan="3">
  					<?php
  						
  					?>
  				<br/><?php echo date("d\/m\/Y");?></th>
 			</tr>
 			<tr nobr="true">
  				<td>Código de barras</td>
  				<td>Nombre</td>
  				<td>Cantidad</td>
		 	</tr>
		 	<?php foreach ($datosProductos as $value): ?>
 			<tr nobr="true">
  				<td><?php echo $value->Codigo_de_barras; ?></td>
  				<td><?php echo $value->Nombre; ?></td>
  				<td><?php echo $value->Stock; ?></td>
 			</tr>
 			<?php endforeach; ?>
		</table>
	<?php
	$tbl=ob_get_clean();

	$pdf->writeHTML($tbl, true, false, false, false, '');

	$pdf->Output('comprobante', 'I');
?>
