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
    $sql = "SELECT idGrupo FROM Grupo WHERE idMateria = '$id'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $idGrupo = $row['idGrupo'];
            $sql2 = "DELETE FROM AlumnoEnGrupo WHERE idGrupo = '$idGrupo'";

            if (!mysqli_query($conn, $sql2)) {
                header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
                echo json_encode('error1');
            }
        }
    }


    $sql3 = "DELETE FROM Grupo WHERE idMateria = '$id'";

    if (mysqli_query($conn, $sql3)) {
        $sql4 = "DELETE FROM Materia WHERE idMateria = '$id'";

        if (mysqli_query($conn, $sql4)) {
            echo json_encode('success');
        } else {
            header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
            echo json_encode('error1');
        }
    } else {
        header('HTTP/1.1 500 Bad connection, something went wrong while saving your data, please try again later');
        echo json_encode('error2');
    }
}
?>
