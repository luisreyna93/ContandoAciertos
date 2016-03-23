<?php
header('Content-type: application/json');

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];

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
    $sql = "SELECT nombre FROM Materia WHERE nombre = '$nombre' AND clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('HTTP/1.1 500 Bad connection to Database');
        die(json_encode(array('message' => 'Este tema ya existe para la materia dada')));
    } else {
        $sql = "INSERT INTO Materia (nombre, clave) VALUES ('$nombre', '$clave')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode("New record created successfully");
        } else {
            header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
            echo "Error: " . $sql . "\n" . mysqli_error($conn);
        }
    }
}

?>
