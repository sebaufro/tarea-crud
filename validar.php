<?php 
	include 'db.php';

	if(!empty($_POST["user"]) && !empty($_POST["passwd"])){
		echo "parte 1";
		
		$query = $pdo->query("SELECT * FROM usuarios WHERE usuario='".$_POST["user"]."'");
		$encontrado = false;
		foreach ($query as $usuario) {
			if($usuario["pass"] == $_POST["passwd"]){
				session_start();

				$_SESSION["id"] = $usuario["id"];
				$_SESSION["user"] = $usuario["usuario"];
				$_SESSION["rol"] = $usuario["rol"];
				
				$encontrado = true;
			}
		}
		if($encontrado){
			header('Location: welcome.php');
		}else{
			header('Location: index.php?error=err1');
		}
		
	}else{
		header('Location: index.php?error=err1');

	}

 ?>