<?php
$PageTitle="EdicionContenido";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Edición de Contenido</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/edContenido.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <div id="edicionContenido" class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="pill" href="#Temas">Temas</a></li>
            <li><a data-toggle="pill" href="#Preguntas">Preguntas</a></li>
        </ul>

        <div class="tab-content">
            <div id="Temas" class="tab-pane fade in active">
                <h3 class="text-center">Edición</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateria">Materia:</label>
                            <select class="form-control" id="selMateria" onchange="getMateriaTema(this.value)">
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selTema">Tema anterior:</label>
                            <select class="form-control" id="selTema">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <label>Tema nuevo:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tema"/>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="editarTema" onclick="editTema()">Editar tema</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Preguntas" class="tab-pane fade">
                <h3 class="text-center">Edición</h3>
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
                            <select class="form-control" id="selTema2" onchange="getQuestions(this.value)">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selPregunta">Pregunta anterior:</label>
                            <select class="form-control" id="selPregunta" onchange="fillQuestion(this.value)">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <label>Pregunta nueva:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="pregunta"/>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3">
                        <label>Opción A (Correcta):</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="opcionA"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Opción B:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="opcionB"/>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3">
                        <label>Opción C:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="opcionC"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Opción D:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="opcionD"/>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="editarPregunta" onclick="editarPregunta()">Editar pregunta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
var dataPreguntas;
$(document).on('ready', function() {

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            // feedback.html('');

            if (jsonData.tipo != 'admin') {
                window.location.href = 'menu.php';
            }
        },
        error: function(message) {
            window.location.href = 'logIn.php';
        }
    });
    $("#selMateria").empty();

    $.ajax({
        type: 'POST',
        url: '../Controllers/getMateriasController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numMaterias; i++) {
                var o = new Option(jsonData[i].nombre, jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].nombre);
                $("#selMateria").append(o);
            }
            for (i = 0; i < jsonData.numMaterias; i++) {
                var o = new Option(jsonData[i].nombre, jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
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
    $("#selTema").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getTopicsForQuestionController.php',
        dataType: 'json',
        data: {"idMateria": value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numTemas; i++) {
                var o = new Option(jsonData[i].tema , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].tema );
                $("#selTema").append(o);
            }
        },
        error: function(message) {
        }
    });
}
function getMateriaTema2(value){
    $("#selTema").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getTopicsForQuestionController.php',
        dataType: 'json',
        data: {"idMateria": value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numTemas; i++) {
                var o = new Option(jsonData[i].tema , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
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
    $("#selPregunta").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getQuestionsFromTopic.php',
        dataType: 'json',
        data: {"idTopic": value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            dataPreguntas= [];
            for (i = 0; i < jsonData.numTemas; i++) {
                var o = new Option(jsonData[i].pregunta , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].pregunta );
                $("#selPregunta").append(o);
                dataPreguntas[jsonData[i].id]= {'pregunta':jsonData[i].pregunta,'opcionA':jsonData[i].opcionA,'opcionB':jsonData[i].opcionB,'opcionC':jsonData[i].opcionC,'opcionD':jsonData[i].opcionD };
            }
            fillQuestion($("#selPregunta").val());
        },
        error: function(message) {
        }
    });
}
function fillQuestion(value){
    if(dataPreguntas.length==0){ 
        $("#pregunta").val("");
        $("#opcionA").val("");
        $("#opcionB").val("");
        $("#opcionC").val("");
        $("#opcionD").val("");
        return;
    }
    $("#pregunta").val(dataPreguntas[value].pregunta);
    $("#opcionA").val(dataPreguntas[value].opcionA);
    $("#opcionB").val(dataPreguntas[value].opcionB);
    $("#opcionC").val(dataPreguntas[value].opcionC);
    $("#opcionD").val(dataPreguntas[value].opcionD);
}
function editTema(){
    $.ajax({
        type: 'POST',
        url: '../Controllers/editTema.php',
        dataType: 'json',
        data: {"idTema": $('#selTema').val(), "tema": $('#tema').val()},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            $.notify("Modificación con éxito", "success");
        },
        error: function(message) {
        }
    });
}
function editarPregunta(){
    $.ajax({
        type: 'POST',
        url: '../Controllers/editPregunta.php',
        dataType: 'json',
        data: {"idPregunta": $('#selPregunta').val(), "pregunta": $("#pregunta").val(), "opcionA": $("#opcionA").val(), "opcionB": $("#opcionB").val(), "opcionC": $("#opcionC").val(), "opcionD": $("#opcionD").val()},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            $.notify("Modificación con éxito", "success");
        },
        error: function(message) {
        }
    });

}
</script>

<?php
include_once('../elements/footer.php');
?>
