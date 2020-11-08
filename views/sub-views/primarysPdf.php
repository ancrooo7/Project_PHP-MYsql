<!DOCTYPE html>
<html>
<head>
	<title>Primary-pdf</title>
	<style type="text/css">
		body {
			display: flex;
			flex-direction: column;
			height: 100vh;
			justify-content: center;
			align-items: center;
		}
		.btn-back {
			background-color: transparent; 
			border: none;
				
		}
		.btn-light {
			width: 25%;
			border: none;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<button class="btn-back">
               	<a href="../../index.php">
                       	<svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1     0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                        	<path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                	</svg>
       		</a>
       	</button>
	<button class="btn-light">
		<a href="../pdfs-views/comprobante.php">
			<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-file-earmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  				<path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
			</svg>
		</a>
		<span>Comprobante - PDF</span>
	</button>
	<button class="btn-light">
		<a href="../pdfs-views/stocKYMovimientos.php">
			<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-file-earmark-fill" fill="currentColor" xmlns="	http://www.w3.org/2000/svg">
	  			<path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0H4zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
			</svg>
		</a>
		<span>Stock y Movimientos - PDF</span>
	</button>
</body>
</html>
