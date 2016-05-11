<?php
header('Content-type: application/json');

$idTopic = $_POST['idTopic'];

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
    $sql = "select p.idPregunta, p.pregunta,p.opcionA,p.opcionB,p.opcionC,p.opcionD from pregunta p where p.idTema='$idTopic';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array('numTemas' => $result -> num_rows);

        while($row = $result->fetch_assoc()) {
            array_push($response, array('id' => $row['idPregunta'], 'pregunta' => $row['pregunta'],'opcionA' => $row['opcionA'],'opcionB' => $row['opcionB'],'opcionC' => $row['opcionC'],'opcionD' => $row['opcionD']));
        }

        echo json_encode($response);
    } else {
        echo json_encode(array('numTemas' => 0));
    }
}

?>
