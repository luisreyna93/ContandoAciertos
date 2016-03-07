<?php

// index.php file 

header('Location: ' . 'Controllers/loginController.php?action=invoke', true, $statusCode);
die(); 
