<?php
$PageTitle="EdicionUsuarios";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Edición de Usuarios</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/edUsuarios.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <div id="edicionUsuarios" class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="pill" href="#Maestros">Maestros</a></li>
            <li><a data-toggle="pill" href="#Alumnos">Alumnos</a></li>
        </ul>

        <div class="tab-content">
            <div id="Maestros" class="tab-pane fade in active">
                <h3 class="text-center">Edición</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selNomina">Nómina:</label>
                            <select class="form-control" id="selNomina" onchange="getTeacherDesc(this.value,this.options[this.selectedIndex].innerHTML)">
                            </select>
                        </div>
                        <label>Contraseña:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordMaestro" value="**notmodifypassword**" />
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3">
                        <label>Nombre:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombreMaestro" placeholder="José"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Apellidos:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="apellidosMaestro" placeholder="González"/>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateriaMaestro">Materia:</label>
                            <select class="form-control" id="selMateriaMaestro" onchange="getGroupFromMateria(this.value)">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2  col-sm-offset-3">
                        <div class="form-group">
                            <label for="selPosiblesMaestro">Grupos posibles:</label>
                            <select multiple class="form-control" id="selPosiblesMaestro">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" id="moverGruposDerecha">Mover <span class="glyphicon glyphicon-arrow-right"></span></button>
                            <button class="btn btn-primary btn-md" id="moverGruposIzquierda">Mover <span class="glyphicon glyphicon-arrow-left"></span></button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="selActualesMaestro">Grupos actuales:</label>
                            <select multiple class="form-control" id="selActualesMaestro">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="editarMaestro" onclick="editarMaestro()">Editar maestro</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Alumnos" class="tab-pane fade">
                <h3 class="text-center">Edición</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMatricula">Matrícula:</label>
                            <select class="form-control" id="selMatricula"onchange="getUserDesc(this.value,this.options[this.selectedIndex].innerHTML)">
                            </select>
                        </div>
                        <label>Contraseña:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordAlumno" value="**notmodifypassword**"/>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3">
                        <label>Nombre:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombreAlumno" placeholder="José"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>Apellidos:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="apellidosAlumno" placeholder="González"/>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateriaAlumno">Materia:</label>
                            <select class="form-control" id="selMateriaAlumno" onchange="getGroupFromMateriaAlumno(this.value)">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2  col-sm-offset-3">
                        <div class="form-group" id="gruposPosibles">
                            <label for="selPosiblesAlumno">Grupos posibles:</label>
                            <select multiple class="form-control" id="selPosiblesAlumno">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" id="moverGruposDerecha2">Agregar <span class="glyphicon glyphicon-arrow-right"></span></button>
                            <button class="btn btn-primary btn-md" id="moverGruposIzquierda2">Quitar <span class="glyphicon glyphicon-arrow-left"></span></button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="selActualesAlumno">Grupos actuales:</label>
                            <select multiple class="form-control" id="selActualesAlumno">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="editarAlumno" onclick="editarAlumno()">Editar alumno</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type = 'text/javascript'>

var posiblesGruposMaestro = $("#selPosiblesMaestro");
var posiblesGruposAlumno = $("#selPosiblesAlumno");
var actualesGruposMaestro = $('#selActualesMaestro');
var actualesGruposAlumno = $('#selActualesAlumno');
var moveToActualButton = $("#moverGruposDerecha");
var moveToPossibleButton = $("#moverGruposIzquierda");
var moveToActualButton2 = $("#moverGruposDerecha2");
var moveToPossibleButton2 = $("#moverGruposIzquierda2");
moveToActualButton.on('click', function() {
    var selItem = posiblesGruposMaestro.prop('selectedIndex');

    if (selItem == -1) {
        feedback.html('Elige uno o más grupos de la lista de posibles grupos.<br>Si está vacía, no hay grupos sin maestro asignado para la materia seleccionada.');
    } else {
        $('#selPosiblesMaestro option:selected').remove().appendTo('#selActualesMaestro').removeAttr('selected');
    }
});

moveToPossibleButton.on('click', function() {
    var selItem = actualesGruposMaestro.prop('selectedIndex');

    if (selItem == -1) {
        feedback.html('No hay grupos actuales.');
    } else {
        $('#selActualesMaestro option:selected').remove().appendTo('#selPosiblesMaestro').removeAttr('selected');
    }
});

moveToActualButton2.on('click', function() {
    var selItem = posiblesGruposAlumno.prop('selectedIndex');

    if (selItem == -1) {
        feedback.html('Elige un grupo de la lista de posibles grupos.<br>Si está vacía, no hay grupos sin maestro asignado para la materia seleccionada.');
    } else {
        $('#selPosiblesAlumno option:selected').remove().appendTo('#selActualesAlumno').removeAttr('selected');
    }
});

moveToPossibleButton2.on('click', function() {
    var selItem = actualesGruposAlumno.prop('selectedIndex');

    if (selItem == -1) {
        feedback.html('No hay grupos actuales.');
    } else {
        $('#selActualesAlumno option:selected').remove().appendTo('#selPosiblesAlumno').removeAttr('selected');
    }
});
var idMaestro;
var dataMaestro=[];
var dataAlumno=[];
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

    $.ajax({
        type: 'POST',
        url: '../Controllers/getTeachersController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            var comboContent = '';
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].nombre + ' ' + jsonData[i].apellido, jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].nombre + ' ' + jsonData[i].apellido);
                $("#selNomina").append(o);
                dataMaestro[jsonData[i].id]=[jsonData[i].nombre,jsonData[i].apellido];
            }
            getTeacherDesc($("#selNomina").val());
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
            var comboContent = '';
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].nombre , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].nombre);
                $("#selMateriaMaestro").append(o);
            }
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].nombre , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].nombre);
                $("#selMateriaAlumno").append(o);
            }
            getGroupFromMateria($("#selMateriaMaestro").val());
            getGroupFromMateriaAlumno($("#selMateriaMaestro").val());
        },
        error: function(message) {
        }
    })
    $.ajax({
        type: 'POST',
        url: '../Controllers/getUsers.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            var comboContent = '';
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].nombre + ' ' + jsonData[i].apellido, jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].nombre + ' ' + jsonData[i].apellido);
                $("#selMatricula").append(o);

                dataAlumno[jsonData[i].id]=[jsonData[i].nombre,jsonData[i].apellido];
            }
            getUserDesc($("#selMatricula").val());
        },
        error: function(message) {
        }
    });
});
function getTeacherDesc(value){
    idMaestro=value;
    $("#nombreMaestro").val(dataMaestro[idMaestro][0]);
    $("#apellidosMaestro").val(dataMaestro[idMaestro][1]);
    $.ajax({
        type: 'POST',
        url: '../Controllers/getTeachersDescController.php',
        dataType: 'json',
        data: {"idMaestro": idMaestro},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            $("#selActualesMaestro").empty();
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].grupo , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].grupo );
                $("#selActualesMaestro").append(o);
            }
        },
        error: function(message) {
        }
    });
}
function getUserDesc(value){
    idMaestro=value;
    $("#nombreAlumno").val(dataAlumno[idMaestro][0]);
    $("#apellidosAlumno").val(dataAlumno[idMaestro][1]);
    $.ajax({
        type: 'POST',
        url: '../Controllers/getUserGroups.php',
        dataType: 'json',
        data: {"idAlumno": idMaestro},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            $("#selActualesAlumno").empty();
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].grupo , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].grupo );
                $("#selActualesAlumno").append(o);
            }
        },
        error: function(message) {
        }
    });
}
function getGroupFromMateria(value){
    $("#selPosiblesMaestro").empty();
    $.ajax({
        type: 'POST',
        url: '../Controllers/getGroupsFromMaterias.php',
        dataType: 'json',
        data: {"idMateria": value,"forType":1},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            for (i = 0; i < jsonData.numMaestros; i++) {
                var o = new Option(jsonData[i].grupo , jsonData[i].id );
                /// jquerify the DOM object 'o' so we can use the html method
                $(o).html(jsonData[i].grupo );
                $("#selPosiblesMaestro").append(o);
            }
        },
        error: function(message) {
        }
    });
}
function getGroupFromMateriaAlumno(value){
    $("#selPosiblesAlumno").empty();
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
                $("#selPosiblesAlumno").append(o);
            }
        },
        error: function(message) {
        }
    });
}
function editarMaestro(){
    var groups = [];

    groups.push($('#selActualesMaestro option').length);

    $('#selActualesMaestro option').each(function() {
        groups.push($(this).prop('value'));
    });

    var parameters = {
        'password': $('#passwordMaestro').val(),
        'name': $('#nombreMaestro').val(),
        'apellido': $('#apellidosMaestro').val(),
        'grupos' : groups,
        'userType': 1,
        'id': $('#selNomina').val()
    };

    $.ajax({
        type: 'POST',
        url: '../Controllers/updateUser.php',
        dataType: 'json',
        data: parameters,
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
        },
        error: function(message) {
        }
    });
}
function editarAlumno(){
    var groups = [];

    groups.push($('#selActualesAlumno option').length);

    $('#selActualesAlumno option').each(function() {
        groups.push($(this).prop('value'));
    });

    var parameters = {
        'password': $('#passwordMaestro').val(),
        'name': $('#nombreMaestro').val(),
        'apellido': $('#apellidosMaestro').val(),
        'grupos' : groups,
        'userType': 2,
        'id': $('#selMatricula').val()
    };

    $.ajax({
        type: 'POST',
        url: '../Controllers/updateUser.php',
        dataType: 'json',
        data: parameters,
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
        },
        error: function(message) {
        }
    });
}
</script>
<?php
include_once('../elements/footer.php');
?>
