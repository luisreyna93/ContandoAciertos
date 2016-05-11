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
    <center><h1> Juego de Trivia </h1></center>
    </br></br></br>
    <div id = 'comboBox-selectors'>
      <label class='col-xs-3 control-label'>Materia</label>
        <div class='col-xs-5 selectContainer'>
            <select class='form-control' name='materia' id='selMateria'>
            </select>
        </div>
        </br></br>
        <label class='col-xs-3 control-label'>Tema</label>
          <div class='col-xs-5 selectContainer'>
              <select class='form-control' name='tema' id='selTema'>
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
        <p id = 'pregunta' >La pregunta:</p>
      </div>
      <h1 id='headerRespuesta' class="text-center">Respuestas:</h1>
      <div id = 'seccion-respuestas' class='row'>
        <div class='radio'>
          <label id='opcion1'><input type='radio' name='optradio'>Option 1</label>
        </div>
        <div class='radio'>
          <label id='opcion2'><input type='radio' name='optradio'>Option 2</label>
        </div>
        <div class='radio'>
          <label id='opcion3'><input type='radio' name='optradio'>Option 3</label>
        </div>
        <div class='radio'>
          <label id='opcion4'><input type='radio' name='optradio'>Option 4</label>
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
        
        var preguntas = [];
        var siguientePregunta;
        var data;
        
        var puntaje = 0;

        cuestionario.hide();
        finishButton.hide();

        initGameButton.on('click', function() {
          $.ajax({
            type: 'POST',
            url: '../Controllers/getQuestionsFromTopic.php',
            dataType: 'json',
            data: {"idTopic": $('#selTema').val()},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
              if(jsonData.numTemas == 0) {
                alert('No hay preguntas para este tema');
              }
              else {
                menu.hide();
                cuestionario.show();
                headPregunta.html('Pregunta ' + pregunta + ':');
                
                for(var i = 0; i < jsonData.numTemas; i++) {
                  preguntas.push(true);
                }
                siguientePregunta = Math.floor(Math.random() * jsonData.numTemas);
                while(!preguntas[siguientePregunta]) {
                  siguientePregunta = Math.floor(Math.random() * jsonData.numTemas);
                }
                $('#pregunta').html(jsonData[siguientePregunta].pregunta);
                preguntas[siguientePregunta] = false;
                
                var opciones = [true, true, true, true];
                var siguienteOpcion;
                for(var i = 1; i <= 4; i++) {
                  siguienteOpcion = Math.floor(Math.random() * 4);
                  while(!opciones[siguienteOpcion]) {
                    siguienteOpcion = Math.floor(Math.random() * 4);
                  }
                  opciones[siguienteOpcion] = false;
                  var radio = "<input type='radio' name='optradio'>";
                  if(i == 1) {
                    radio = "<input type='radio' name='optradio' checked='checked'>";
                  }
                  if(siguienteOpcion == 0) {
                    radio = "<input type='radio' name='optradio' value='correct'>";
                    if(i == 1) {
                      radio = "<input type='radio' name='optradio' checked='checked' value='correct'>";
                    }
                    $('#opcion' + i).html(radio + jsonData[siguientePregunta].opcionA);
                  }
                  else if(siguienteOpcion == 1) {
                    $('#opcion' + i).html(radio + jsonData[siguientePregunta].opcionB);
                  }
                  else if(siguienteOpcion == 2) {
                    $('#opcion' + i).html(radio + jsonData[siguientePregunta].opcionC);
                  }
                  else {
                    $('#opcion' + i).html(radio + jsonData[siguientePregunta].opcionD);
                  }
                }
              }
              
              data = jsonData;
            },
            error: function(message) {
              alert('No hay preguntas para este tema');
            }
          });
        });

        nextButton.on('click', function() {
          if($("input[type='radio'][name='optradio']:checked").val() === 'correct') {
            alert('¡Respuesta correcta!');
            puntaje += 10;
          }
          else {
            alert('¡Respuesta incorrecta!\n\n La respuesta correcta era: ' + data[siguientePregunta].opcionA);
          }
          
          pregunta += 1;
          // Hacer update a pregunta y respuestas
          headPregunta.html('Pregunta ' + pregunta + ':');
          
          siguientePregunta = Math.floor(Math.random() * data.numTemas);
          while(!preguntas[siguientePregunta]) {
            siguientePregunta = Math.floor(Math.random() * data.numTemas);
          }
          $('#pregunta').html(data[siguientePregunta].pregunta);
          preguntas[siguientePregunta] = false;
          
          var opciones = [true, true, true, true];
          var siguienteOpcion;
          for(var i = 1; i <= 4; i++) {
            siguienteOpcion = Math.floor(Math.random() * 4);
            while(!opciones[siguienteOpcion]) {
              siguienteOpcion = Math.floor(Math.random() * 4);
            }
            opciones[siguienteOpcion] = false;
            var radio = "<input type='radio' name='optradio'>";
            if(i == 1) {
              radio = "<input type='radio' name='optradio' checked='checked'>";
            }
            if(siguienteOpcion == 0) {
              radio = "<input type='radio' name='optradio' value='correct'>";
              if(i == 1) {
                radio = "<input type='radio' name='optradio' checked='checked' value='correct'>";
              }
              $('#opcion' + i).html(radio + data[siguientePregunta].opcionA);
            }
            else if(siguienteOpcion == 1) {
              $('#opcion' + i).html(radio + data[siguientePregunta].opcionB);
            }
            else if(siguienteOpcion == 2) {
              $('#opcion' + i).html(radio + data[siguientePregunta].opcionC);
            }
            else {
              $('#opcion' + i).html(radio + data[siguientePregunta].opcionD);
            }
          }

          if (pregunta >= 10) {
            nextButton.hide();
            finishButton.show();
          }
        });

        finishButton.on('click', function() {
          if($("input[type='radio'][name='optradio']:checked").val() === 'correct') {
            alert('¡Respuesta correcta!');
            puntaje += 10;
          }
          else {
            alert('¡Respuesta incorrecta!\n\n La respuesta correcta era: ' + data[siguientePregunta].opcionA);
          }
          
          $.ajax({
            type: 'POST',
            url: '../Controllers/createNuevoJuegoAlumno.php',
            dataType: 'json',
            data: {"idTopic": $('#selTema').val(), "puntaje": puntaje},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
              console.log(jsonData.success);
            },
            error: function(errorMsg) {
              console.log(errorMsg.statusText);
            }
          });
          
          alert('Fin del cuestionario, tu puntaje fue: ' + puntaje);
          
          headPregunta.html('Fin del Cuestionario');
          window.location.reload();
        });
        
        $.ajax({
            type: 'POST',
            url: '../Controllers/sessionController.php',
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
            },
            error: function(message) {
                window.location.href = 'logIn.php';
            }
        });
        
        $.ajax({
          type: 'POST',
          url: '../Controllers/getMateriasForUserController.php',
          dataType: 'json',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          success: function(jsonData) {
              var comboContent = '';

              for (i = 0; i < jsonData.numMaterias; i++) {
                  comboContent += '<option value=' + jsonData[i].id + '>' + jsonData[i].nombre + '</option>';
              }

              $('#selMateria').html(comboContent);
              $('#selMateria').trigger('change');
          },
          error: function(message) {
          }
        });
        
        $('#selMateria').change(function() {
          if ($('#selMateria').html() != '') {
            var parameters = {
                'idMateria' : $('#selMateria').val()
            };

            $.ajax({
                type: 'POST',
                url: '../Controllers/getTopicsForQuestionController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var comboContent = ''

                    if (jsonData.numTemas != 0) {
                        for (i = 0; i < jsonData.numTemas; i++) {
                            comboContent += '<option value=' + jsonData[i].id + '>' + jsonData[i].tema + '</option>';
                        }
                    }

                    $('#selTema').html(comboContent);
                },
                error: function(message) {
                    console.log('Tema No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
          }
        });
      });

    </script>

<?php
include_once('../elements/footer.php');
?>
