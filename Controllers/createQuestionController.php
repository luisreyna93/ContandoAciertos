<?php
header('Content-type: application/json');

$idTema = $_POST['idTema'];
$pregunta = $_POST['pregunta'];
$opA = $_POST['opA'];
$opB = $_POST['opB'];
$opC = $_POST['opC'];
$opD = $_POST['opD'];

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
    $sql = "SELECT pregunta FROM Pregunta WHERE pregunta = '$pregunta' AND idTema = '$idTema'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('HTTP/1.1 500 Bad connection to Database');
        die(json_encode(array('message' => 'Esta pregunta ya existe para el tema dado')));
    } else {
        $sql = "INSERT INTO Pregunta (idTema, pregunta, opcionA, opcionB, opcionC, opcionD) VALUES ('$idTema', '$pregunta', '$opA', '$opB', '$opC', '$opD')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode("New record created successfully");
        } else {
            header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
            echo "Error: " . $sql . "\n" . mysqli_error($conn);
        }
    }
}

?>
