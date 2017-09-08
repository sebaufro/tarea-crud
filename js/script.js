$("#btn-enviar-noticia").click(function(e) {
    e.preventDefault();
    var titulo = $("#titulo-crear").val();
    var texto = $("#texto-crear").val();

    $.post('crear-noticia.php', {titulo: titulo, texto: texto}, function(data) {
        location.replace("welcome.php");
    });    
});

$(".editar-noticia").click(function(event) {
    event.preventDefault();
    var id = $(this).val();
    var titulo = $("#titulo-editar-" + id).val();
    var texto = $("#texto-editar-" + id).val();

    $.post('editar-noticia.php', {id: id, titulo: titulo, texto: texto}, function(data) {
        location.replace("welcome.php");
    });
});

$(".eliminar-noticia").click(function(event) {
    event.preventDefault();
    var id = $(this).val();
    
    $.post('eliminar-noticia.php', {id: id}, function(data) {
        location.replace("welcome.php");
    });
});