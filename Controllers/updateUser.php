<?php
header('Content-type: application/json');

$type = $_POST['userType'];
$password = $_POST['password'];
$nombre = $_POST['name'];
$apellidos = $_POST['apellido'];
$grupos = $_POST['grupos'];
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
    die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
} else {
    if($password=='**notmodifypassword**')
        $sql = "UPDATE trivia.usuario SET nombre='".$nombre."', apellido='".$apellidos."' WHERE  idUsuario=".$id;
    else    
        $sql = "UPDATE trivia.usuario SET password='".$password."', nombre='".$nombre."', apellido='".$apellidos."' WHERE  idUsuario=".$id;
    echo $sql;
    mysqli_query($conn, $sql);
    if ($type == 1) {
        $sql = "UPDATE Grupo SET idMaestro = '-1' WHERE idMaestro = '$id'";
        mysqli_query($conn, $sql);
        for ($i = 1; $i <= $grupos[0]; $i++) {
            $grupo = $grupos[$i];
            $sql = "UPDATE Grupo SET idMaestro = '$id' WHERE idGrupo = '$grupo'";
            mysqli_query($conn, $sql);
        }
    } else {
        $sql = "DELETE FROM AlumnoEnGrupo WHERE idAlumno = '$id'";
            mysqli_query($conn, $sql);
        for ($i = 1; $i <= $grupos[0]; $i++) {
            $grupo = $grupos[$i];
            $sql = "INSERT INTO AlumnoEnGrupo (idAlumno, idGrupo) VALUES ('$id', '$grupo')";
            mysqli_query($conn, $sql);
        }
    }
            

    echo json_encode("New record created successfully");

}

?>
