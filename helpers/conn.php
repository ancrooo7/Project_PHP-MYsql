<?php
	$contrasena = '1*16304617';
	$usuario = 'root';
	$nombrebd = 'adminProducts';

	try {
		$bd = new PDO(
			'mysql:host=localhost;
			dbname='.$nombrebd,
				$usuario,
				$contrasena,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e){
		echo "Error de conexión ".$e->getMessage();
	}
?>
