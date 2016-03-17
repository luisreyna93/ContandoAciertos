<?php
$PageTitle='Juego';
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Juego</title>
    <link rel='stylesheet' type='text/css' href='../css/juego.css'>
    </head>

    <?php
        include_once('../elements/nav.php');
    ?>
  </br></br></br>
  <div id = 'menu' class = 'container'>
    <center><h1> Tabla de Puntajes </h1></center>
    </br></br></br>
    <div id = 'comboBox-selectors'>
      <label class='col-xs-3 control-label'>Materia</label>
        <div class='col-xs-5 selectContainer'>
            <select class='form-control' name='materia'>
                <option value=''>Elije una materia</option>
                <option value='black'>1</option>
                <option value='green'>2</option>
                <option value='red'>3</option>
            </select>
        </div>
        </br></br>
        <label class='col-xs-3 control-label'>Tema</label>
          <div class='col-xs-5 selectContainer'>
              <select class='form-control' name='tema'>
                  <option value=''>Elije un tema</option>
                  <option value='black'>1</option>
                  <option value='green'>2</option>
                  <option value='red'>3</option>
              </select>
          </div>
    </div>
    </br></br></br>
    <div class='form-group'>
        <div class='col-xs-5 col-xs-offset-6'>
            <button id = 'initGame' class='btn btn-default'>Comenzar juego</button>
        </div>
    </div>
  </div>

  <div id = 'cuestionario' class='container'>
    <div>
      <h1 id='headerPregunta' class="text-center">Pregunta</h1>
      <div id = 'seccion-pregunta' class='row'>
        <p>La pregunta:</p>
      </div>
      <h1 id='headerRespuesta' class="text-center">Respuestas:</h1>
      <div id = 'seccion-respuestas' class='row'>
        <div class='radio'>
          <label><input type='radio' name='optradio'>Option 1Option 1Option 1Option 1Option 1Option 1Option 1Option 1Option 1Option 1</label>
        </div>
        <div class='radio'>
          <label><input type='radio' name='optradio'>Option 2</label>
        </div>
        <div class='radio'>
          <label><input type='radio' name='optradio'>Option 3</label>
        </div>
        <div class='radio'>
          <label><input type='radio' name='optradio'>Option 4</label>
        </div>
      </div>
      <br><br>
      <div id = 'seccion-control' class='row'>
        <button id='sigPregunta' class='btn btn-default'>Siguiente</button>
        <button id='terminar' class='btn btn-default'>Terminar</button>
      </div>
    </div>
  </div>

    <body>

    <script>
      $(document).on('ready', function() {
        var cuestionario = $('#cuestionario');
        var menu = $('#menu');
        var initGameButton = $('#initGame');
        var nextButton = $('#sigPregunta');
        var finishButton = $('#terminar');
        var headPregunta = $('#headerPregunta');

        var pregunta = 1;

        cuestionario.hide();
        finishButton.hide();

        initGameButton.on('click', function() {
          menu.hide();
          cuestionario.show();
          headPregunta.html('Pregunta ' + pregunta + ':');
        });

        nextButton.on('click', function() {
          pregunta += 1;
          // Hacer update a pregunta y respuestas
          headPregunta.html('Pregunta ' + pregunta + ':');

          if (pregunta >= 10) {
            nextButton.hide();
            finishButton.show();
          }
        });

        finishButton.on('click', function() {
          headPregunta.html('Fin del Cuestionario');
        });
      });

    </script>

<?php
include_once('../elements/footer.php');
?>
