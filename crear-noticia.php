<?php 

include 'db.php';
session_start();

if(isset($_POST["titulo"]) && isset($_POST["texto"]) && $_SESSION["rol"] == 1){
    $titulo = $db->escape_string($_POST['titulo']);
    $texto = $db->escape_string($_POST['texto']);

    $db->query("INSERT INTO noticias (titulo, texto) " .
        "VALUES ('".$titulo."', '".$texto."');");

    
    $datos = array('ok' => '1');
    echo json_encode($datos);
}
