<?php
if(!isset($db)) {
  die;
}
?>

<div class="panel panel-primary mt-3">
  <div class="panel-heading">
    <h3 class="panel-title">Panel Administración | <?php echo $usuario["usuario"]; ?></h3>
  </div>
  <div class="panel-body">
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
                <a class="btn btn-primary" href='editar-noticia.php' disabled="disabled">Editar</a>
                <a class="btn btn-danger" href='borrar-noticia.php' disabled="disabled">Eliminar</a>
              </td>
            </tr>
          <?php } ?>			 			
        </tbody>
      </table>
    </div>
    <div class="col-sm-4 col-sm-offset-4"><a class="btn btn-primary btn-block" data-toggle="modal" href="crear-noticia.php">Crear Noticia</a></div>
  </div>
</div>

<?php
/*
$query = $db->query("SELECT * FROM noticias");
foreach ($query as $noticia) { ?>
<div class="modal fade" id="ed_<?php echo $noticia["id_noticia"]; ?>">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title">Editar Noticia</h4>
     </div>
     <div class="modal-body">
       <form action="" method="POST" class="form-horizontal" role="form">
         <div class="form-group">
           <label for="titulo-editar-<?php echo $noticia["id_noticia"]; ?>" class="col-sm-2">Título</label>
           <div class="col-sm-10">
             <input type="text" name="titulo-editar-<?php echo $noticia["id_noticia"]; ?>" id="titulo-editar-<?php echo $noticia["id_noticia"]; ?>" class="form-control" required="required" placeholder="Ingrese el título de la noticia" value="<?php echo $noticia["id_noticia"]; ?>">
           </div>
         </div>
         <div class="form-group">
           <label for="texto-editar-<?php echo $noticia["id_noticia"]; ?>" class="col-sm-2">Texto</label>
           <div class="col-sm-10">
             <textarea name="texto-editar-<?php echo $noticia["id_noticia"]; ?>" id="texto-editar-<?php echo $noticia["id_noticia"]; ?>" class="form-control" rows="3" required="required" placeholder="Ingrese el cuerpo de la noticia"><?php echo $noticia["texto"]; ?></textarea>
           </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button value="<?php echo $noticia["id_noticia"]; ?>" type="button" class="btn btn-primary editar-noticia">Editar</button>
        </div>
      </form>	
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="del_<?php echo $noticia["id_noticia"]; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Eliminar Noticia</h4>
      </div>
      <div class="modal-body">
        ¿Está seguro que desea eliminar la noticia?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button value="<?php echo $noticia["id_noticia"]; ?>" type="button" class="btn btn-danger eliminar-noticia">Eliminar</button>
      </div>
    </div>
  </div>
</div>
*/
