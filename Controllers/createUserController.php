<?php
header('Content-type: application/json');

$type = $_POST['forType'];
$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$grupos = $_POST['grupos'];

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
    $sql = "SELECT username FROM Usuario WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('HTTP/1.1 500 Bad connection to Database');
        die(json_encode(array('message' => 'Este usuario ya existe para la nomina o matricula dada')));
    } else {
        if ($type == 1) {
            $sql = "INSERT INTO Usuario (username, password, nombre, apellido, tipo) VALUES ('$username', '$password', '$nombre', '$apellidos', 'maestro')";
        } else {
            $sql = "INSERT INTO Usuario (username, password, nombre, apellido, tipo) VALUES ('$username', '$password', '$nombre', '$apellidos', 'alumno')";
        }

        if (mysqli_query($conn, $sql)) {
            if ($grupos[0] > 0) {
                $sql = "SELECT idUsuario FROM Usuario WHERE username = '$username'";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    $newUserId = $row['idUsuario'];
                }

                if ($type == 1) {
                    for ($i = 1; $i <= $grupos[0]; $i++) {
                        $grupo = $grupos[$i];
                        $sql = "UPDATE Grupo SET idMaestro = '$newUserId' WHERE idGrupo = '$grupo'";
                        mysqli_query($conn, $sql);
                    }
                } else {
                    for ($i = 1; $i <= $grupos[0]; $i++) {
                        $grupo = $grupos[$i];
                        $sql = "INSERT INTO AlumnoEnGrupo (idAlumno, idGrupo) VALUES ('$newUserId', '$grupo')";
                        mysqli_query($conn, $sql);
                    }
                }
            }

            echo json_encode("New record created successfully");

        } else {
            header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
            echo "Error: " . $sql . "\n" . mysqli_error($conn);
        }
    }
}

?>
