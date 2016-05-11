<?php
$PageTitle="BajaContenido";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Baja de Contenido</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/delContenido.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <div id="bajaContenido" class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="pill" href="#Temas">Temas</a></li>
            <li><a data-toggle="pill" href="#Preguntas">Preguntas</a></li>
        </ul>

        <div class="tab-content">
            <div id="Temas" class="tab-pane fade in active">
                <h3 class="text-center">Baja</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateria">Materia:</label>
                            <select class="form-control" id="selMateria" onchange="getMateriaTema(this.value)">
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered" id="tableTema">
                        <thead>
                            <tr>
                                <th class="col-md-9">Tema</th>
                                <th>¿Borrar?</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="bajaTema" onclick="deleteTema()">Dar de baja temas</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Preguntas" class="tab-pane fade">
                <h3 class="text-center">Baja</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateria2">Materia:</label>
                            <select class="form-control" id="selMateria2" onchange="getMateriaTema2(this.value)">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selTema2">Tema:</label>
                            <select class="form-control" id="selTema2">
                                <option>Tema 1</option>
                                <option>Tema 2</option>
                                <option>Tema 3</option>
                                <option>Tema 4</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered" id="tablePreguntas">
                        <thead>
                            <tr>
                                <th class="col-md-5">Pregunta</th>
                                <th>Opción A (Correcta)</th>
                                <th>Opción B</th>
                                <th>Opción C</th>
                                <th>Opción D</th>
                                <th>¿Borrar?</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="bajaPregunta" onclick="deletePregunta()">Dar de baja preguntas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
$(document).on('ready', function() {

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            if (jsonData.tipo != 'admin') {
                window.location.href = 'menu.php';
            }
        },
        error: function(message) {
            window.location.href = 'logIn.php';
        }
    });
    $("#selMateria").empty();
    $("#selMateria2").empty();

    $.ajax({
        type: 'POST',
        url: '../Controllers/getMateriasController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numMaterias; i++) {
                var o = new Option(jsonData[i].nombre, jsonData[i].id );

                $(o).html(jsonData[i].nombre);
                $("#selMateria").append(o);
            }
            for (i = 0; i < jsonData.numMaterias; i++) {
                var o = new Option(jsonData[i].nombre, jsonData[i].id );

                $(o).html(jsonData[i].nombre);
                $("#selMateria2").append(o);
            }
            data= jsonData;
            getMateriaTema($("#selMateria").val());
            getMateriaTema2($("#selMateria2").val());
        },
        error: function(message) {
        }
    });
});
function getMateriaTema(value){
    $("#tableTema tbody").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getTopicsForQuestionController.php',
        dataType: 'json',
        data: {"idMateria": value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numTemas; i++) {
                $("#tableTema").find("tbody").append( "<tr><td>"+jsonData[i].tema+"</td><td><label><input class='check' type='checkbox' value='"+jsonData[i].id+"'></label></td></tr>" );
            }
        },
        error: function(message) {
        }
    });
}
function deleteTema(){
    var selected = [];
    $('.check:checked').each(function() {
        selected.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: '../Controllers/deleteTemas.php',
        dataType: 'json',
        data: {"temas": JSON.stringify(selected)},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            getMateriaTema($("#selMateria").val());
            $.notify("Tema Borrado", "success");
        },
        error: function(message) {
            $.notify("Tema No Borrado", "error");
        }
    });
}
function getMateriaTema2(value){
    $("#selTema2").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getTopicsForQuestionController.php',
        dataType: 'json',
        data: {"idMateria": value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numTemas; i++) {
                var o = new Option(jsonData[i].tema , jsonData[i].id );

                $(o).html(jsonData[i].tema );
                $("#selTema2").append(o);
            }
           getQuestions($("#selTema2").val());
        },
        error: function(message) {
        }
    });
}
function getQuestions(value){

    $("#tablePreguntas tbody").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getQuestionsFromTopic.php',
        dataType: 'json',
        data: {"idTopic": value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            dataPreguntas= [];
            for (i = 0; i < jsonData.numTemas; i++) {
                $("#tablePreguntas").find("tbody").append( '<tr><td>'+jsonData[i].pregunta+'</td><td>'+jsonData[i].opcionA+'</td><td>'+jsonData[i].opcionA+'</td><td>'+jsonData[i].opcionA+'</td><td>'+jsonData[i].opcionA+'</td><td><label><input type="checkbox" class="check2" value="'+jsonData[i].id+'"></label></td></tr>' );
            }

        },
        error: function(message) {
        }
    });
}
function deletePregunta(){
    var selected = [];
    $('.check2:checked').each(function() {
        selected.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: '../Controllers/deletePreguntas.php',
        dataType: 'json',
        data: {"temas": JSON.stringify(selected)},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            getQuestions($("#selTema2").val());
            $.notify("Pregunta Borrada", "success");
        },
        error: function(message) {
            $.notify("Pregunta No Borrada", "error");
        }
    });
}
</script>

<?php
include_once('../elements/footer.php');
?>
