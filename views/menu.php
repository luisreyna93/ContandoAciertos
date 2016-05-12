<?php
$PageTitle='LogIn';
include_once('../elements/header.php');
?>

<title> Contando Aciertos - Menú </title>

</head>

<?php
include_once('../elements/nav.php');
?>

<body>

</br></br></br>
<h1 id = 'welcomeMessage'> Bienvenido Usuario! </h1>
</br></br></br>

<div class='col-xs-4' id='juegoSquare'>
    <div class='jumbotron'>
        <h1>Juego</h1>
        <p>Responde un cuestionario, seleccionando algún tema de tus cursos.</p>
        <p><a class='btn btn-primary btn-lg pull-right' href='juego.php' role='button'>Ir</a></p>
    </div>
</div>

<div class='col-xs-4' id='puntaje'>
    <div class='jumbotron'>
        <h1>Puntaje</h1>
        <p>Revisa la tabla de puntajes.</p>
        <p><a class='btn btn-primary btn-lg pull-right' href='puntaje.php' role='button'>Ir</a></p>
    </div>
</div>

<div class='col-xs-4' id='altasSquare'>
    <div class='jumbotron'>
        <h1>Alta de Usuarios</h1>
        <p>Da de alta a nuevos usuarios.</p>
        <p><a class='btn btn-primary btn-lg pull-right' href='regUsuarios.php' role='button'>Ir</a></p>
    </div>
</div>

</body>

<script type = 'text/javascript'>
$(document).on('ready', function() {
    var welcomeMessage = $('#welcomeMessage');
    var altasSquare = $('#altasSquare');
    var juegoSquare = $('#juegoSquare');

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            welcomeMessage.html('¡Bienvenido ' + jsonData.firstName + '!');

            if (jsonData.tipo == 'alumno') {
                altasSquare.hide();
            } else {
                juegoSquare.hide();
            }
        },
        error: function(message) {
            window.location.href = 'logIn.php';
        }
    });
});

</script>

<?php
include_once('../elements/footer.php');
?>
