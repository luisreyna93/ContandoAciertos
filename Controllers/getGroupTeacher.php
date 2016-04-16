<?php
header('Content-type: application/json');

$idGrupo = $_POST['idGrupo'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR', 'code' => 500)));
} else {
    $sql = "SELECT idMaestro FROM Grupo WHERE idGrupo = '$idGrupo'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row['idMaestro']);
    } else {
        echo json_encode(-1);
    }
}

?>
