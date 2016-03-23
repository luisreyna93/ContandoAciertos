<?php
header('Content-type: application/json');

session_start();
$username = $_SESSION['username'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
} else {
    $sql = "SELECT idUsuario, nombre, apellido FROM Usuario WHERE tipo = 'maestro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array('numMaestros' => $result -> num_rows);

        while($row = $result->fetch_assoc()) {
            array_push($response, array('nombre' => $row['nombre'], 'apellido' => $row['apellido'], 'id' => $row['idUsuario']));
        }

        echo json_encode($response);
    } else {
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }
}

?>
