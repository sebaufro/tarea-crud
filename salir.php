<?php 
	session_start();
	// session_unregister();
	session_destroy();

	header('Location: index.php');
 ?>