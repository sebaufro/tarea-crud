<?php 
include 'db.php';
session_start();

if(!isset($_SESSION['usuario'])) {
	header('Location: ./');
	die;
}

if(isset($_GET["id"]) ){
	
	$id =$_GET['id'];
	$db->query("DELETE FROM noticias WHERE id_noticia=$id");
}

header("Location: welcome.php");
?>
