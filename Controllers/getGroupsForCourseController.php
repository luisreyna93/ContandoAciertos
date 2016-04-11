<?php
header('Content-type: application/json');

$type = $_POST['forType'];
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
    die(json_encode(array('message' => 'ERROR', 'code' => 500)));
} else {
    if ($type == 1) {
        $sql = "SELECT idGrupo, numero FROM Grupo WHERE idMaestro = '-1' AND idMateria = '$idMateria'";
    } else {
        $sql = "SELECT idGrupo, numero FROM Grupo WHERE idMateria = '$idMateria'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array('numGrupos' => $result -> num_rows);

        while($row = $result->fetch_assoc()) {
            array_push($response, array('numero' => $row['numero'], 'id' => $row['idGrupo']));
        }

        echo json_encode($response);
    } else {
        header('HTTP/1.1 306 No groups found for given course.');
        die(json_encode(array('message' => 'ERROR', 'code' => 306)));
    }
}

?>
