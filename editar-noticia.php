<?php 
include 'db.php';
session_start();

if(!isset($_SESSION['usuario'])) {
	header('Location: ./');
	die;
}

$error = '';
if(isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
}

$usuario = $_SESSION['usuario'];
  $id =$_GET['id'];
if(isset($_POST["titulo"]) && isset($_POST["texto"])){

	
  $titulo=$db->escape_string($_POST["titulo"]);
  $texto=$db->escape_string($_POST["texto"]);

$result =$db->query("UPDATE noticias SET titulo='$titulo', texto='$texto' WHERE id_noticia=$id");
if(!$result) {
    $_SESSION['error'] = $db->error;
    header('Location: editar-noticia.php?id='.$id);
  } else {
    header('Location: welcome.php');
  }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agregar noticia</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php 
				$result =$db->query("SELECT titulo, texto FROM noticias where id_noticia=$id LIMIT 1"); 
				while($line = $result ->fetch_assoc()){
					 $title= $line['titulo'];
					 $text= $line['texto'];
				 }?>
	<div class="container">
    <div class="row justify-content-md-center mt-5">
      <div class="col-sm-8">
        <div class="card">
          <h4 class="card-header">Editar noticia</h4>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" value="<?php echo $title; ?>" class="form-control" id="titulo">
				
              </div>
              <div class="form-group">
                <label for="texto">Contenido</label>
                <textarea id="texto" name="texto"  class="form-control" rows="5"><?php echo $text; ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Agregar</button>
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
