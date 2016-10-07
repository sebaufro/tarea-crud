<?php 
	include 'db.php';
	session_start();

	if(isset($_POST["titulo"]) && isset($_POST["texto"]) && $_SESSION["rol"]== 1){
		$pdo->query("INSERT INTO noticias (titulo, texto)
			VALUES ('".$_POST["titulo"]."',
					'".$_POST["texto"]."');");

		
		$datos = array('ok' => '1', 'enlace' => $_SERVER[HTTP_HOST]);

		echo json_encode($datos);
	}
 ?>