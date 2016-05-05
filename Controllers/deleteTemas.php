<?php
header('Content-type: application/json');

session_start();
$username = $_SESSION['username'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

$temas = json_decode($_POST['temas']);
// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR con', 'code' => 1337)));
} else {

    $sql = "DELETE FROM `trivia`.`pregunta` WHERE  `idTema` in ('".join("','", $temas)."')";

    $result = $conn->query($sql);
    $sql = "DELETE FROM `trivia`.`tema` WHERE  `idTema` in ('".join("','", $temas)."')";

    $result = $conn->query($sql);
    echo json_encode($sql);

}

?>
