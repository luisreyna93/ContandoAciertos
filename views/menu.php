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

    <div class='col-xs-4'>
      <div class='jumbotron'>
        <h1>Juego</h1>
        <p>Responde un cuestionario, seleccionando algún tema de tus cursos.</p>
        <p><a class='btn btn-primary btn-lg pull-right' href='#' role='button'>Ir</a></p>
      </div>
    </div>

    <div class='col-xs-4'>
      <div class='jumbotron'>
        <h1>Puntaje</h1>
        <p>Revisa la tabla de puntajes.</p>
        <p><a class='btn btn-primary btn-lg pull-right' href='#' role='button' href='puntaje.php'>Ir</a></p>
      </div>
    </div>

    <div class='col-xs-4'>
      <div class='jumbotron'>
        <h1>Hello, world!</h1>
        <p>...</p>
        <p><a class='btn btn-primary btn-lg pull-right' href='#' role='button'>Learn more</a></p>
      </div>
    </div>

  </body>

  <script type = 'text/javascript'>
    $(document).on('ready', function() {
      var welcomeMessage = $('#welcomeMessage');

      $.ajax({
        type: 'POST',
        url: '../Controllers/menuController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
          welcomeMessage.html('¡Bienvenido ' + jsonData.firstName + '!');
        },
        error: function(message) {
          alert(message.statusText);
        }
      });
    });

  </script>

<?php
include_once('../elements/footer.php');
?>
