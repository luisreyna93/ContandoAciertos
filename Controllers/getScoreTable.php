<?php
header('Content-type: application/json');

$idMateria = $_POST['idMateria'];
$idTema = $_POST['idTema'];

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
    $sql = "SELECT A.nombre AS 'nombreAlumno', A.apellido AS 'apellidoAlumno', G.numero, P.nombre, P.apellido, AJT.puntaje FROM Usuario A, Usuario P, Grupo G, AlumnoJuegaTema AJT, AlumnoEnGrupo AEG WHERE A.idUsuario = AJT.idAlumno AND AJT.idTema = '$idTema' AND A.idUsuario = AEG.idAlumno AND AEG.idGrupo = G.idGrupo AND G.idMateria = '$idMateria' AND G.idMaestro = P.idUsuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array('numRegisters' => $result -> num_rows);

        while($row = $result->fetch_assoc()) {
            array_push($response, array('nombre' => $row['nombreAlumno'], 'apellido' => $row['apellidoAlumno'], 'grupo' => $row['numero'], 'profesor' => $row['nombre'].' '.$row['apellido'], 'puntaje' => $row['puntaje']));
        }

        echo json_encode($response);
    } else {
        echo json_encode(array('numRegisters' => 0));
    }
}

?>
