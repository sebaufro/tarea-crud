
<?php 
	$nombre = "Juan Nieve"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="panel panel-info col-xs-12 col-sm-4 col-sm-offset-4">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">

				<form class="form-horizontal" action="validar.php" method="POST">
				  <div class="form-group">
				    <label for="user" class="col-sm-2 control-label">Usuario</label>
				    <div class="col-sm-10">
				      <input type="user" name="user" class="form-control" id="user" placeholder="Usuario">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="passwd" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="passwd" name="passwd" class="form-control" id="passwd" placeholder="Contraseña">
				    </div>
				  </div>
				  
				  <div class="form-group">
				      <button type="submit" class="btn btn-primary btn-block">Login</button>
				  </div>
				</form>
				<?php 
					if(isset($_GET["error"])){
						if ($_GET["error"] = "err1") {
							echo "<div class=\"alert alert-danger\">
									<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
									<strong>ERROR!</strong> El usuario o contraseña son incorrectos.
								</div>";
						}
					}
				 ?>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.min.js"></script>
</body>
</html>
