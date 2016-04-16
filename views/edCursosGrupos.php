<?php
$PageTitle="EdicionCursosyGrupos";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Edición Cursos y Grupos</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <div id="edicionUsuarios" class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="pill" href="#cursos">Cursos</a></li>
            <li><a data-toggle="pill" href="#grupos">Grupos</a></li>
        </ul>

        <div class="tab-content">
            <div id="cursos" class="tab-pane fade in active">
                <h3 class="text-center">Edicion</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <select class="form-control" id="selMateria" onchange="getMateriaDesc(this.selectedIndex)">
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-3">
                        <label>Nombre:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombreCurso"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="selClave">Clave:</label>
                            <input type="text" class="form-control" id="clave"/>
                        </div>
                    </div>

                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button onclick="editarCurso()" class="btn btn-primary btn-lg" id="crearCurso">Editar Curso</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="grupos" class="tab-pane fade">
                <h3 class="text-center">Edicion</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateria">Materia:</label>
                            <select class="form-control" id="selMateriaGrupo" onchange="getGrupos(this.value)">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selGrupo">Grupo:</label>
                            <select class="form-control" id="selGrupo" onchange="getGroupTeacher(this.value)">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selMaestro">Maestro:</label>
                            <select class="form-control" id="selMaestro">
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button onclick="editarGrupo()" class="btn btn-primary btn-lg" id="crearGrupo">Editar Grupo</button>
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
var data;
function onload(){
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
            data= jsonData;
            $("#nombreCurso").val(jsonData[0]["nombre"]);
            $("#clave").val(jsonData[0]["clave"]);
        },
        error: function(message) {
        }
    });
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
                $("#selMateriaGrupo").append(o);
            }
            getGrupos($("#selMateriaGrupo").val());
        },
        error: function(message) {
        }
    });
}
function getGrupos(value){
    $("#selGrupo").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getGroupsFromMaterias.php',
        dataType: 'json',
        data: {"idMateria": value,"forType":2},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].grupo , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].grupo );
                $("#selGrupo").append(o);
            }
            getGroupTeacher($("#selGrupo").val());
        },
        error: function(message) {
        }
    });
}
$(document).on('ready', function() {
    onload();

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            //   feedback.html('');

            if (jsonData.tipo != 'admin') {
                window.location.href = 'menu.php';
            }
        },
        error: function(message) {
            window.location.href = 'logIn.php';
        }
    });

    $.ajax({
        type: 'POST',
        url: '../Controllers/getTeachersController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            var comboContent = '';
            var o = new Option("Sin Asignar", -1);
            $(o).html("Sin Asignar");
            $("#selMaestro").append(o);
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].nombre + ' ' + jsonData[i].apellido, jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].nombre + ' ' + jsonData[i].apellido);
                $("#selMaestro").append(o);
                
            }
        },
        error: function(message) {
        }
    });

});
function getGroupTeacher(value){
    $.ajax({
        type: 'POST',
        url: '../Controllers/getGroupTeacher.php',
        dataType: 'json',
        data: {'idGrupo': value},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            $("#selMaestro").val(jsonData);
        },
        error: function(message) {
        }
    });
}
function getMateriaDesc(value){
    $("#nombreCurso").val(data[value]["nombre"]);
    $("#clave").val(data[value]["clave"]);
}
function editarCurso(){
    $.ajax({
        type: 'POST',
        url: '../Controllers/editMaterias.php',
        dataType: 'json',
        data: {"idMateria":$("#selMateria").val(), "nombre": $("#nombreCurso").val(),"clave": $("#clave").val()},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            //todo: push notification of success.
            onload();
            $.notify("Modificación con éxito", "success");
        },
        error: function(message) {
        }
    });
}
function editarGrupo(){
    $.ajax({
        type: 'POST',
        url: '../Controllers/editGrupo.php',
        dataType: 'json',
        data: {"idGrupo":$("#selGrupo").val(), "idMaestro":$("#selMaestro").val() },
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            //todo: push notification of success.
            onload();
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
