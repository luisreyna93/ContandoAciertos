<?php
header('Content-type: application/json');

session_start();
$username = $_SESSION['username'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

$idMateria = $_POST['idMateria'];
$nombre= mysql_real_escape_string($_POST['nombre']);
$clave = mysql_real_escape_string($_POST['clave']);
// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR con', 'code' => 1337)));
} else {
    $sql = "UPDATE materia SET nombre = '$nombre', clave = '$clave' WHERE idMateria = '$idMateria'";
    $result = $conn->query($sql);
    echo json_encode("New record created successfully");

}

?>
