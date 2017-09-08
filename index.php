<?php 
session_start();
$error = '';
if(isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
}
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center mt-5">
      <div class="col-sm-6">
        <div class="card">
          <h4 class="card-header">Iniciar sesión</h4>
          <div class="card-body">
            <form action="validar.php" method="post">
              <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" name="user" class="form-control" id="user">
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="passwd" class="form-control" id="password">
              </div>
              <button type="submit" class="btn btn-primary">Ingresar</button>
            </form>
          </div>
        </div>
        <?php if($error) { ?>
        <div class="alert alert-danger mt-3" role="alert">
          <b>Error</b>: <?php echo $error; ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>