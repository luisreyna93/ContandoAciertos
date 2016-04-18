<?php
header('Content-type: application/json');

session_start();
$username = $_SESSION['username'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

$idTema = $_POST['idTema'];
$tema= mysql_real_escape_string($_POST['tema']);
// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR con', 'code' => 1337)));
} else {
    $sql = "update tema set tema.nombre='".$tema."' where idTema=". $idTema;
    $result = $conn->query($sql);
    echo json_encode("New record created successfully");

}

?>
