<?php 
	session_start();
	include 'db.php';


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Bienvenido <?php echo $_SESSION["user"]; ?>
 		<?php 
 			if($_SESSION["rol"] == 1){
 				echo "| Panel de Administración";
 			}elseif($_SESSION["rol"] == 2){
 				echo "| Panel de Usuario";
 			}
 		 ?>
 	</title>
 	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.min.css">
 </head>
 <body>
 	<div class="container-fluid">
 		<?php 
 			if($_SESSION["rol"] == 1){
 				echo "<div class=\"panel panel-primary\">
					 	<div class=\"panel-heading\">
					 		<h3 class=\"panel-title\">Panel Administración | ".$_SESSION["user"]."</h3>
					 	</div>
					 	<div class=\"panel-body\">
					 		<div class=\"table-responsive\">
							 	<table class=\"table table-hover\">
							 		<thead>
							 			<tr>
							 				<th>Título noticia</th>
							 				<th>Acciones</th>
							 			</tr>
							 		</thead>
							 		<tbody>";
				$query = $pdo->query("SELECT * FROM noticias");
				foreach ($query as $noticia) {
					echo "<tr>
							 <td>".$noticia["titulo"]."</td>
							 <td><a class=\"btn btn-primary\" href='#ed_".$noticia["id_noticia"]."' disabled=\"disabled\">Editar</a>
							 <a class=\"btn btn-danger\" href='#del_".$noticia["id_noticia"]."' disabled=\"disabled\">Eliminar</a></td>
						</tr>";
				}			 			
				echo "		 		</tbody>
							 	</table>
							 </div>
						<div class=\"col-sm-4 col-sm-offset-4\"><a class=\"btn btn-primary btn-block\" data-toggle=\"modal\" href='#modal-id'>Crear Noticia</a></div>
					 	</div>
					 </div>";
				echo "<div class=\"modal fade\" id=\"modal-id\">
					 	<div class=\"modal-dialog\">
					 		<div class=\"modal-content\">
					 			<div class=\"modal-header\">
					 				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
					 				<h4 class=\"modal-title\">Crear Noticia</h4>
					 			</div>
					 			<div class=\"modal-body\">
					 				<form action=\"\" method=\"POST\" class=\"form-horizontal\" role=\"form\">
										<div class=\"form-group\">
											<label for=\"titulo-crear\" class=\"col-sm-2\">Título</label>
											<div class=\"col-sm-10\">
												<input type=\"text\" name=\"titulo-crear\" id=\"titulo-crear\" class=\"form-control\" required=\"required\" placeholder=\"Ingrese el título de la noticia\">
											</div>
										</div>
										<div class=\"form-group\">
											<label for=\"texto-crear\" class=\"col-sm-2\">Texto</label>
											<div class=\"col-sm-10\">
												<textarea name=\"texto-crear\" id=\"texto-crear\" class=\"form-control\" rows=\"3\" required=\"required\" placeholder=\"Ingrese el cuerpo de la noticia\"></textarea>
											</div>
										</div>
							 			<div class=\"modal-footer\">
							 				<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
							 				<button id=\"btn-enviar-noticia\" type=\"button\" class=\"btn btn-primary\">Crear</button>
							 			</div>
									</form>
					 			</div>
					 		</div>
					 	</div>
					 </div>";
				$query = $pdo->query("SELECT * FROM noticias");
				foreach ($query as $noticia) {
					echo "<div class=\"modal fade\" id=\"ed_".$noticia["id_noticia"]."\">
							<div class=\"modal-dialog\">
								<div class=\"modal-content\">
									<div class=\"modal-header\">
										<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
										<h4 class=\"modal-title\">Editar Noticia</h4>
									</div>
									<div class=\"modal-body\">
										<form action=\"\" method=\"POST\" class=\"form-horizontal\" role=\"form\">
											<div class=\"form-group\">
												<label for=\"titulo-editar-".$noticia["id_noticia"]."\" class=\"col-sm-2\">Título</label>
												<div class=\"col-sm-10\">
													<input type=\"text\" name=\"titulo-editar-".$noticia["id_noticia"]."\" id=\"titulo-editar-".$noticia["id_noticia"]."\" class=\"form-control\" required=\"required\" placeholder=\"Ingrese el título de la noticia\" value=\"".$noticia["titulo"]."\">
												</div>
											</div>
											<div class=\"form-group\">
												<label for=\"texto-editar-".$noticia["id_noticia"]."\" class=\"col-sm-2\">Texto</label>
												<div class=\"col-sm-10\">
													<textarea name=\"texto-editar-".$noticia["id_noticia"]."\" id=\"texto-editar-".$noticia["id_noticia"]."\" class=\"form-control\" rows=\"3\" required=\"required\" placeholder=\"Ingrese el cuerpo de la noticia\">".$noticia["texto"]."</textarea>
												</div>
											</div>
								 			<div class=\"modal-footer\">
								 				<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancelar</button>
								 				<button value=\"".$noticia["id_noticia"]."\" type=\"button\" class=\"btn btn-primary editar-noticia\">Editar</button>
								 			</div>
										</form>	
									</div>
								</div>
							</div>
						</div>";
					echo "<div class=\"modal fade\" id=\"del_".$noticia["id_noticia"]."\">
						 	<div class=\"modal-dialog\">
						 		<div class=\"modal-content\">
						 			<div class=\"modal-header\">
						 				<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
						 				<h4 class=\"modal-title\">Eliminar Noticia</h4>
						 			</div>
						 			<div class=\"modal-body\">
						 				¿Está seguro que desea eliminar la noticia?
						 			</div>
						 			<div class=\"modal-footer\">
						 				<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
						 				<button value=\"".$noticia["id_noticia"]."\" type=\"button\" class=\"btn btn-danger eliminar-noticia\">Eliminar</button>
						 			</div>
						 		</div>
						 	</div>
						 </div>";
				}
 			}elseif($_SESSION["rol"] == 2){
 				echo "<div class=\"panel panel-success\">
					 	<div class=\"panel-heading\">
					 		<h3 class=\"panel-title\">Panel Noticias | Bienvenido ".$_SESSION["user"]."</h3>
					 	</div>
					 	<div class=\"panel-body\">";
				$query = $pdo->query("SELECT * FROM noticias ORDER BY id_noticia DESC");
				foreach ($query as $noticia) {
					echo "<div class=\"row noticia\">
							<h2 class=\"titulo-noticia\">".$noticia["titulo"]." <span class=\"fecha\">".$noticia["fecha"]."</span></h2>
							<p class=\"cuerpo-noticia\">".$noticia["texto"]."</p>
						</div>";
				}
				echo "	 	</div>
					 </div>";
 			} 
 		?>
 		<div class="col-xs-12 col-sm-2 col-sm-offset-5">
 			<a href="salir.php" class="btn btn-danger btn-block">Salir</a>
 		</div>
 	</div>
 <script src="js/jquery-1.12.3.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/script.min.js"></script>
 </body>
 </html>