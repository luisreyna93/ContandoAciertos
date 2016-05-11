<?php
header('Content-type: application/json');

$id = $_POST['id'];

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'trivia';

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    header('HTTP/1.1 500 Bad connection to Database');
    die(json_encode(array('message' => 'ERROR con', 'code' => 1337)));
} else {
    $sql = "DELETE FROM AlumnoEnGrupo WHERE idAlumno = '$id'";

    if (mysqli_query($conn, $sql)) {
        $sql2 = "DELETE FROM Usuario WHERE idUsuario = '$id'";

        if (mysqli_query($conn, $sql2)) {
            echo json_encode('success');
        } else {
            header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
            echo json_encode('error');
        }
    } else {
        header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
        echo json_encode('error');
    }
}
?>
