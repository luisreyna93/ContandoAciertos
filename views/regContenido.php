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
                                <option>Materia 1</option>
                                <option>Materia 2</option>
                                <option>Materia 3</option>
                                <option>Materia 4</option>
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
                                <option>Materia 1</option>
                                <option>Materia 2</option>
                                <option>Materia 3</option>
                                <option>Materia 4</option>
                            </select>
                        </div>
                    </div>
                    <div class='col-sm-6 col-sm-offset-3'>
                        <div class='form-group'>
                            <label for='selTema'>Tema:</label>
                            <select class='form-control' id='selTema'>
                                <option>Tema 1</option>
                                <option>Tema 2</option>
                                <option>Tema 3</option>
                                <option>Tema 4</option>
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
    var welcomeMessage = $('#welcomeMessage');
    var comboMaterias = $('#selMateria');
    var comboMaterias2 = $('#selMateria2');
    var crearTemaButton = $('#crearTema');
    var temaInput = $('#tema');
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

        } else {
            alert('NO');
        }
    });

});

</script>

<?php
include_once('../elements/footer.php');
?>
