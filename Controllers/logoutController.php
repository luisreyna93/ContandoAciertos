<?php
  header('Content-type: application/json');

	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['nombre']);
	unset($_SESSION['apellido']);
	unset($_SESSION['tipo']);
	unset($_SESSION['idUsuario']);
	session_destroy();

?>
