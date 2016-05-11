<?php
header('Content-type: application/json');

$idTema = $_POST['idTopic'];
$puntaje = $_POST['puntaje'];
session_start();
$idAlumno = $_SESSION['idUsuario'];

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
        $sql = "INSERT INTO AlumnoJuegaTema(idAlumno, idTema, Puntaje) VALUES ('$idAlumno', '$idTema', '$puntaje')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => "New record created successfully"));
        } else {
            $sql = "UPDATE AlumnoJuegaTema SET Puntaje = '$puntaje' WHERE idAlumno = '$idAlumno' AND idTema = '$idTema' AND Puntaje < '$puntaje'";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("success" => "Record updated successfully"));
            }
            else {
                echo "Error: " . $sql . "\n" . mysqli_error($conn);
            }
        }
    }

?>
