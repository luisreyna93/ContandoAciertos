<?php
$PageTitle='RegistroContenido';
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Registro Contenido</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/regContenido.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <div id='registroContenido' class='container'>
        <ul class='nav nav-pills nav-justified'>
            <li class='active'><a data-toggle='pill' href='#Temas'>Temas</a></li>
            <li><a data-toggle='pill' href='#Preguntas'>Preguntas</a></li>
        </ul>

        <div class='tab-content'>

            <div id='Temas' class='tab-pane fade in active'>
                <h3 class='text-center'>Registro</h3>
                <div class='row'>
                    <div class='col-sm-6 col-sm-offset-3'>
                        <div class='form-group'>
                            <label for='selMateria'>Materia:</label>
                            <select class='form-control' id='selMateria'>
                            </select>
                        </div>
                    </div>
                    <div class='col-sm-6 col-sm-offset-3'>
                        <label>Tema:</label>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='tema'/>
                        </div>
                    </div>
                    <div class='col-sm-2 col-sm-offset-5'>
                        <div class='form-group'>
                            <button class='btn btn-primary btn-lg' id='crearTema'>Crear tema</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id='Preguntas' class='tab-pane fade'>
                <h3 class='text-center'>Registro</h3>
                <div class='row'>
                    <div class='col-sm-6 col-sm-offset-3'>
                        <div class='form-group'>
                            <label for='selMateria2'>Materia:</label>
                            <select class='form-control' id='selMateria2'>
                            </select>
                        </div>
                    </div>
                    <div class='col-sm-6 col-sm-offset-3'>
                        <div class='form-group'>
                            <label for='selTema'>Tema:</label>
                            <select class='form-control' id='selTema'>
                            </select>
                        </div>
                    </div>
                    <div class='col-sm-6 col-sm-offset-3'>
                        <label>Pregunta:</label>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='pregunta'/>
                        </div>
                    </div>
                    <div class='col-sm-3 col-sm-offset-3'>
                        <label>Opción A (Correcta):</label>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='opcionA'/>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <label>Opción B:</label>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='opcionB'/>
                        </div>
                    </div>
                    <div class='col-sm-3 col-sm-offset-3'>
                        <label>Opción C:</label>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='opcionC'/>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <label>Opción D:</label>
                        <div class='form-group'>
                            <input type='text' class='form-control' id='opcionD'/>
                        </div>
                    </div>
                    <div class='col-sm-2 col-sm-offset-5'>
                        <div class='form-group'>
                            <button class='btn btn-primary btn-lg' id='crearPregunta'>Crear pregunta</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id = 'feedback' class = 'text-center'>
            </div>
        </div>
    </div>
</body>

<script type = 'text/javascript'>
$(document).on('ready', function() {
    var comboMaterias = $('#selMateria');
    var comboMaterias2 = $('#selMateria2');
    var comboTemas = $('#selTema');
    var crearTemaButton = $('#crearTema');
    var crearPreguntaButton = $('#crearPregunta');
    var temaInput = $('#tema');
    var preguntaInput = $('#pregunta');
    var opcionAInput = $('#opcionA');
    var opcionBInput = $('#opcionB');
    var opcionCInput = $('#opcionC');
    var opcionDInput = $('#opcionD');
    var feedback = $('#feedback');

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            feedback.html('');
        },
        error: function(message) {
            window.location.href = 'logIn.php';
        }
    });

    $.ajax({
        type: 'POST',
        url: '../Controllers/contentController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            var comboContent = ''

            for (i = 0; i < jsonData.numMaterias; i++) {
                comboContent += '<option value=' + jsonData[i].id + '>' + jsonData[i].materia + '</option>';
            }

            comboMaterias.html(comboContent);
            comboMaterias2.html(comboContent);

            comboMaterias2.trigger('change');
        },
        error: function(message) {
            alert(message);
        }
    });

    crearTemaButton.on('click', function() {
        var parameters = {
            'idMateria' : comboMaterias.val(),
            'tema' : temaInput.val()
        };

        if (temaInput.val() != "") {
            $.ajax({
                type: 'POST',
                url: '../Controllers/createTopicController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    feedback.html('Tema Registrado');
                },
                error: function(message) {
                    feedback.html('Tema No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        }  else {
            feedback.html('El campo \'Tema\' es obligatorio');
        }
    });

    comboMaterias2.change(function() {
        if (comboMaterias2.html() != '') {
            var parameters = {
                'idMateria' : comboMaterias2.val()
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

                    comboTemas.html(comboContent);
                },
                error: function(message) {
                    feedback.html('Tema No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        }
    });

    crearPreguntaButton.on('click', function() {
        var parameters = {
            'idTema' : comboTemas.val(),
            'pregunta' : preguntaInput.val(),
            'opA' : opcionAInput.val(),
            'opB' : opcionBInput.val(),
            'opC' : opcionCInput.val(),
            'opD' : opcionDInput.val()
        };

        if (preguntaInput.val() != "" && opcionAInput.val() != "" && opcionBInput.val() != "") {
            $.ajax({
                type: 'POST',
                url: '../Controllers/createQuestionController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    feedback.html('Pregunta Registrada');
                },
                error: function(message) {
                    feedback.html('Pregunta No Registrada<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        } else {
            feedback.html('Los campos \'Pregunta\', \'Opción A\' y  \'Opción B\' son obligatorios');
        }
    });
});

</script>

<?php
include_once('../elements/footer.php');
?>
