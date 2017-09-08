<?php 
include 'db.php';
session_start();

if(!isset($_SESSION['usuario'])) {
  header('Location: ./');
  die;
}

$usuario = $_SESSION["usuario"];
$rolTitle = $usuario['rol'] == 1 ? "Administración" : "Usuario";


$error = '';
if(isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido <?php echo $usuario["usuario"]; ?> | Panel de <?php echo $rolTitle ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col">
        <?php 
          if ($usuario["rol"] == 1){
            include "include/cont-admin.php";
          } elseif ($usuario["rol"] == 2){
            include "include/cont-usuario.php";
          }
        ?>
      </div>  
    </div>
    <div class="row mt-3">
      <div class="col">
        <a href="salir.php" class="btn btn-danger">Cerrar sesión</a>
      </div>
    </div>
        <?php if($error) { ?>
    <div class="row mt-3">
      <div class="col">
            <div class="alert alert-danger" role="alert">
              <b>Error</b>: <?php echo $error; ?>
            </div>
      </div>
    </div>
        <?php } ?>
  </div>
</body>
</html>
