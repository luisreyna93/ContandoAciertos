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
    die(json_encode(array('message' => 'ERROR', 'code' => 500)));
} else {
    $sql = "SELECT * FROM Grupo WHERE idMateria = '$idMateria'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array();

        while($row = $result->fetch_assoc()) {
            $grupo = 'Grupo ' . $row['numero'];
            $idMaestro = $row['idMaestro'];

            $sql2 = "SELECT nombre, apellido FROM Usuario WHERE idUsuario = '$idMaestro'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();

                array_push($response, array('id' => $row['idGrupo'], 'grupo' => $grupo, 'nombreMaestro' => $row2['nombre'] . ' ' . $row2['apellido']));
            }
            else {
                header('HTTP/1.1 315 No teacher assigned for given group.');
                die(json_encode(array('message' => 'ERROR', 'code' => 315)));
            }
        }

        echo json_encode($response);
    } else {
            $response = 0;
            echo json_encode($response);
        }
    }

?>
