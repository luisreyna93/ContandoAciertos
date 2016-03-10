<?php
  header('Content-type: application/json');

	session_start();

	unset($_SESSION['username']);
	unset($_SESSION['firstName']);
	unset($_SESSION['lastName']);
	session_destroy();

?>
