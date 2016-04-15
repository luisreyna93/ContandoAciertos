<?php
$PageTitle = 'Puntaje';
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Puntaje</title>
<script type = 'text/javascript' src = '../js/puntaje.js'></script>
<link type = 'text/css' rel = 'stylesheet' href = '../css/puntaje.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
</br></br></br>
<link rel = 'import' href = '../elements/comboBox.html'>
<div class = 'container'>
    <center><h1> Tabla de Puntajes </h1></center>
</br></br></br>
<div id = 'comboBox-selectors'>
    <label class='col-xs-3 control-label'>Materia</label>
    <div class='col-xs-5 selectContainer'>
        <select class='form-control' name='color' id = 'comboMateria'>
        </select>
    </div>
</br></br>
<label class='col-xs-3 control-label'>Tema</label>
<div class='col-xs-5 selectContainer'>
    <select class='form-control' name='color' id = 'comboTema'>
    </select>
</div>
</div>
</br></br></br>
<div class = 'col-md-15'>
    <div class = 'panel panel-success'>
        <div class = 'panel-heading'>
            <h3 class = 'panel-title'>Resultados</h3>
            <div class = 'pull-right'>
                <span class = 'clickable filter' data-toggle = 'tooltip' title = 'Toggle table filter' data-container = 'body'>
                    <i class = 'glyphicon glyphicon-filter'></i>
                </span>
            </div>
        </div>
        <div class = 'panel-body'>
            <input type = 'text' class = 'form-control' id = 'task-table-filter' data-action = 'filter' data-filters = '#task-table' placeholder = 'Filter Tasks' />
        </div>
        <table class = 'table table-hover' id = 'task-table'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Grupo</th>
                    <th>Profesor</th>
                    <th>Puntaje</th>
                </tr>
            </thead>
            <tbody id = 'tableBody'>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</body>

<script type = 'text/javascript'>
$(document).on('ready', function() {
    var comboMaterias = $('#comboMateria');
    var comboTemas = $('#comboTema');
    var table = $('#tableBody');

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
        url: '../Controllers/getMateriasController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            var comboContent = '';

            for (i = 0; i < jsonData.numMaterias; i++) {
                comboContent += '<option value=' + jsonData[i].id + '>' + jsonData[i].nombre + '</option>';
            }

            comboMaterias.html(comboContent);

            comboMaterias.trigger('change');
        },
        error: function(message) {
        }
    });

    comboMaterias.change(function() {
        if (comboMaterias.html() != '') {
            var parameters = {
                'idMateria' : comboMaterias.val()
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
                    comboTemas.trigger('change');
                },
                error: function(message) {
                    feedback.html('Tema No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        }
    });

    comboTemas.change(function() {
        if (comboTemas.html() != '') {
            var parameters = {
                'idMateria' : comboMaterias.val(),
                'idTema' : comboTemas.val()
            };

            $.ajax({
                type: 'POST',
                url: '../Controllers/getScoreTable.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var comboContent = ''

                    if (jsonData.numRegisters != 0) {
                        for (i = 0; i < jsonData.numRegisters; i++) {
                            comboContent += '<tr>';
                            comboContent += '<td>' + jsonData[i].nombre + '</td>';
                            comboContent += '<td>' + jsonData[i].apellido + '</td>';
                            comboContent += '<td>' + jsonData[i].grupo + '</td>';
                            comboContent += '<td>' + jsonData[i].profesor + '</td>';
                            comboContent += '<td>' + jsonData[i].puntaje + '</td>';
                            comboContent += '</tr>';
                        }
                    }

                    table.html(comboContent);
                },
                error: function(message) {
                }
            });
        }
    });

});

</script>

<?php
include_once('../elements/footer.php');
?>
