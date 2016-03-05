<?php

// index.php file  
include_once("Controllers/loginController.php");
$controller = new loginController();  
$controller->invoke();  