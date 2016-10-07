<?php 
	$usuario = "root";
	$pass = "phnx";
	$database = "tarea";
	$server = "localhost";
	
	try {
		$pdo = new PDO("mysql:dbname=".$database.";host=".$server, $usuario,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (Exception $e) {
		echo "Error al conectar con la base de datos".$e->getMessage();
	}
 ?>