<?php
if(!isset($db)) {
  die;
}
?>

<div class="card">
  <h4 class="card-header">Panel Administración | <?php echo $usuario["usuario"]; ?></h4>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Título noticia</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = $db->query("SELECT * FROM noticias");
          foreach ($query as $noticia) { ?>
            <tr>
              <td><?php echo $noticia["titulo"] ?></td>
              <td>
                <a class="btn btn-primary" href='editar-noticia.php?id=<?php echo $noticia["id_noticia"]; ?>' disabled="disabled">Editar</a>
                <a class="btn btn-danger" href='borrar-noticia.php?id=<?php echo $noticia["id_noticia"]; ?>' disabled="disabled">Eliminar</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="col">
      <a class="btn btn-primary" data-toggle="modal" href="crear-noticia.php">Crear Noticia</a>
    </div>
  </div>
</div>
