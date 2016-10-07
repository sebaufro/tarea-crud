$(document).ready(function() {
	$("#btn-enviar-noticia").click(function(e) {
		e.preventDefault();
		var titulo = $("#titulo-crear").val();
		var texto = $("#texto-crear").val();

		$.ajax({
		  url: 'crear-noticia.php',
		  type: 'POST',
		  dataType: 'JSON',
		  data: {titulo: titulo, texto: texto},
		  success: function(data) {
		  	window.location.replace("http://"+data.enlace+"/welcome.php");
		  }

		});
		
	});

	$(".editar-noticia").click(function(event) {
		event.preventDefault();
		var id = $(this).val();
		var titulo = $("#titulo-editar-"+id).val();
		var texto = $("#texto-editar-"+id).val();

		$.ajax({
		  url: 'editar-noticia.php',
		  type: 'POST',
		  dataType: 'json',
		  data: {id: id, titulo: titulo, texto: texto},
		  success: function(data) {
		    window.location.replace("http://"+data.enlace+"/welcome.php");
		  }
		});
		
	});

	$(".eliminar-noticia").click(function(event) {
		event.preventDefault();

		var id = $(this).val();

		$.ajax({
		  url: 'eliminar-noticia.php',
		  type: 'POST',
		  dataType: 'json',
		  data: {id: id},
		  success: function(data) {
		    window.location.replace("http://"+data.enlace+"/welcome.php");
		  }
		});
		
	});
});