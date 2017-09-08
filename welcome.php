<?php 
include 'db.php';
session_start();

if(!isset($_SESSION['usuario'])) {
	header('Location: ./');
	die;
}

$usuario = $_SESSION["usuario"];
$rolTitle = $usuario['rol'] == 1 ? "Administración" : "Usuario";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido <?php echo $usuario["usuario"]; ?> | Panel de <?php echo $rolTitle ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<?php 
			if ($usuario["rol"] == 1){
				include "include/cont-admin.php";
			} elseif ($usuario["rol"] == 2){
				include "include/cont-usuario.php";
			}
		?>
		<div class="col-xs-12 col-sm-2 col-sm-offset-5">
			<a href="salir.php" class="btn btn-danger btn-block">Salir</a>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/script.min.js"></script>
</body>
</html>
