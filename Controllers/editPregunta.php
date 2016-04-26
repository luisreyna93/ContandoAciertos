<?php
header('Content-type: application/json');

session_start();
$username = $_SESSION['username'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

$idPregunta = $_POST['idPregunta'];
$pregunta= mysql_real_escape_string($_POST['pregunta']);
$opcionA= mysql_real_escape_string($_POST['opcionA']);
$opcionB= mysql_real_escape_string($_POST['opcionB']);
$opcionC= mysql_real_escape_string($_POST['opcionC']);
$opcionD= mysql_real_escape_string($_POST['opcionD']);
// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR con', 'code' => 1337)));
} else {
    $sql = "update pregunta set pregunta.pregunta='$pregunta', pregunta.opcionA='$opcionA', pregunta.opcionB='$opcionB', pregunta.opcionC='$opcionC',pregunta.opcionD='$opcionD' where idPregunta=". $idPregunta;
    $result = $conn->query($sql);
    echo json_encode("New record created successfully");

}

?>
