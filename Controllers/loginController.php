<?php
header('Content-type: application/json');

$username = $_POST['username'];
$password = $_POST['password'];

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
    $sql = "SELECT idUsuario, username, nombre, apellido, tipo FROM Usuario WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        session_start();

        if (!isset($_SESSION['username'])) {
            $_SESSION['username'] = $username;
            $_SESSION['nombre'] = $row["nombre"];
            $_SESSION['apellido'] = $row["apellido"];
            $_SESSION['tipo'] = $row["tipo"];
            $_SESSION['idUsuario'] = $row["idUsuario"];
        }

        echo json_encode("Success");
    } else {
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }
}

?>
