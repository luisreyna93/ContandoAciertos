<?php
header('Content-type: application/json');

$idMateria = $_POST['idMateria'];
$idMaestro = $_POST['idMaestro'];
$grupo = $_POST['grupo'];

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
    $sql = "SELECT numero FROM Grupo WHERE idMateria = '$idMateria' AND numero = '$grupo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('HTTP/1.1 500 Bad connection to Database');
        die(json_encode(array('message' => 'Este grupo ya existe para la materia dada')));
    } else {
        if ($grupo >= 0) {
            $sql = "INSERT INTO Grupo (idMaestro, idMateria, numero) VALUES ('$idMaestro', '$idMateria', '$grupo')";
        } else {
            $sql = "INSERT INTO Grupo (idMateria, numero) VALUES ('$idMateria', '$grupo')";
        }

        if (mysqli_query($conn, $sql)) {
            echo json_encode("New record created successfully");
        } else {
            header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
            echo "Error: " . $sql . "\n" . mysqli_error($conn);
        }
    }
}

?>
