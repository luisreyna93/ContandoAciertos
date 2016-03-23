<?php
header('Content-type: application/json');

$idMateria = $_POST['idMateria'];

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
    $sql = "SELECT idTema, nombre FROM Tema WHERE idMateria = '$idMateria'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array('numTemas' => $result -> num_rows);

        while($row = $result->fetch_assoc()) {
            array_push($response, array('tema' => $row['nombre'], 'id' => $row['idTema']));
        }

        echo json_encode($response);
    } else {
        echo json_encode(array('numTemas' => 0));
    }
}

?>
