<?php 
include 'db.php';
session_start();

if(!isset($_SESSION['usuario'])) {
	header('Location: ./');
	die;
}

$_SESSION["error"] = "Función no implementada";
header("Location: welcome.php");
