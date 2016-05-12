<?php
header('Content-type: application/json');

session_start();
$tipo = $_SESSION['tipo'];

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
    $idUsuario = $_SESSION['idUsuario'];
    
    if($tipo != 'alumno') {
        $sql = "SELECT * FROM Materia";
    }
    else {
        $sql = "SELECT m.idMateria, m.clave, m.nombre FROM alumnoengrupo aeg, grupo g, materia m WHERE aeg.idAlumno = '$idUsuario' AND g.idGrupo = aeg.idGrupo AND g.idMateria = m.idMateria AND m.idMateria";
    }
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array('numMaterias' => $result -> num_rows);

        while($row = $result->fetch_assoc()) {
            array_push($response, array('nombre' => $row['nombre'], 'clave' => $row['clave'], 'id' => $row['idMateria']));
        }

        echo json_encode($response);
    } else {
        die(json_encode(array('message' => 'ERROR 2', 'code' => 1337)));
    }
}

?>
