<?php 
include 'db.php';
session_start();

// Función para redirigir al usuario donde corresponda
function redirigir($error) {
	if(!$error) {
		header('Location: welcome.php');
	} else {
		$_SESSION['error'] = $error;
		header('Location: index.php');
	}
}

// Validar si los datos fueron enviados
if(empty($_POST["user"]) || empty($_POST["passwd"])){
	redirigir("Datos no enviados");
	die; // Termina el procesamiento del script
}

// Sanitizar usuario y hacer consulta
$usuario = $db->escape_string($_POST["user"]);
$resultado = $db->query("SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1");

// Error en la consulta
if(!$resultado) {
	redirigir("Error al cargar datos de usuario: " . $db->error);
	die;
}

// num_rows entrega la cantidad de filas entregadas por la consulta
// (la consulta está limitada a 1 resultado)
if ($resultado->num_rows == 0) {
	redirigir('Usuario no encontrado!');
	die;
}

// Cargar el primer resultado como arreglo con nombres
$usuario = $resultado->fetch_assoc();

// Validar contraseña
if($usuario['pass'] != $_POST['passwd']) {
	redirigir('Contraseña incorrecta!');
	die;
}

// Guardar usuario en sesión y redirigir
$_SESSION['usuario'] = $usuario;
redirigir(false);
