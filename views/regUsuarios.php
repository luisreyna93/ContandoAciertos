<?php
$PageTitle="RegistroUsuarios";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Registro Usuarios</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/regUsuarios.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <div id="registroUsuarios" class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="pill" href="#Maestros">Maestros</a></li>
            <li><a data-toggle="pill" href="#Alumnos">Alumnos</a></li>
        </ul>

        <div class="tab-content">
            <div id="Maestros" class="tab-pane fade in active">
                <h3 class="text-center">Registro</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <label>Nómina:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomina" placeholder="L01234567"/>
                        </div>
                        <label>Contraseña:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordMaestro" placeholder="********"/>
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
                            <select class="form-control" id="selMateriaMaestro">
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
                            <button class="btn btn-primary btn-md" id="moverGruposDerechaMaestro">Mover <span class="glyphicon glyphicon-arrow-right"></span></button>
                            <button class="btn btn-primary btn-md" id="moverGruposIzquierdaMaestro">Mover <span class="glyphicon glyphicon-arrow-left"></span></button>
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
                            <button class="btn btn-primary btn-lg" id="crearMaestro">Crear maestro</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Alumnos" class="tab-pane fade">
                <h3 class="text-center">Registro</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <label>Matrícula:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="matricula" placeholder="A01234567"/>
                        </div>
                        <label>Contraseña:</label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordAlumno" placeholder="********"/>
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
                            <select class="form-control" id="selMateriaAlumno">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2  col-sm-offset-3">
                        <div class="form-group" id="gruposPosibles">
                            <label for="selPosiblesAlumno">Grupos posibles:</label>
                            <select class="form-control" id="selPosiblesAlumno">
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button class="btn btn-primary btn-md" id="moverGruposDerechaAlumno">Agregar <span class="glyphicon glyphicon-arrow-right"></span></button>
                            <button class="btn btn-primary btn-md" id="moverGruposIzquierdaAlumno">Quitar <span class="glyphicon glyphicon-arrow-left"></span></button>
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
                            <button class="btn btn-primary btn-lg" id="crearAlumno">Crear alumno</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id = 'feedback' class = 'text-center'></div>
        </div>
    </div>
</body>

<script type = 'text/javascript'>
$(document).on('ready', function() {
    var matriculaInput = $('#matricula');
    var passwordAlumnoInput = $('#passwordAlumno');
    var nombreAlumnoInput = $('#nombreAlumno');
    var apellidosAlumnoInput = $('#apellidosAlumno');
    var nominaInput = $('#nomina');
    var passwordMaestroInput = $('#passwordMaestro');
    var nombreMaestroInput = $('#nombreMaestro');
    var apellidosMaestroInput = $('#apellidosMaestro');
    var crearAlumnoButton = $('#crearAlumno');
    var crearMaestroButton = $('#crearMaestro');
    var comboMaterias = $('#selMateriaMaestro');
    var comboMaterias2 = $('#selMateriaAlumno');
    var posiblesGruposMaestro = $("#selPosiblesMaestro");
    var posiblesGruposAlumno = $("#selPosiblesAlumno");
    var actualesGruposMaestro = $('#selActualesMaestro');
    var actualesGruposAlumno = $('#selActualesAlumno');
    var moveToActualButton = $("#moverGruposDerechaMaestro");
    var moveToPossibleButton = $("#moverGruposIzquierdaMaestro");
    var moveToActualButton2 = $("#moverGruposDerechaAlumno");
    var moveToPossibleButton2 = $("#moverGruposIzquierdaAlumno");
    var feedback = $('#feedback');

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            feedback.html('');

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

            comboMaterias.trigger('change');
            comboMaterias2.trigger('change');

            courses = jsonData;
        },
        error: function(message) {
            alert(message);
        }
    });

    comboMaterias.change(function() {
        if (comboMaterias.html() != '') {
            var parameters = {
                'forType' : 1,
                'idMateria' : comboMaterias.val()
            };

            $.ajax({
                type: 'POST',
                url: '../Controllers/getGroupsForCourseController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var comboContent = ''

                    for (i = 0; i < jsonData.numGrupos; i++) {
                        comboContent += '<option value=' + jsonData[i].id + '>' + 'Grupo ' + jsonData[i].numero + '</option>';
                    }

                    posiblesGruposMaestro.html(comboContent);
                },
                error: function(message) {
                    feedback.html('Tema No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        }
    });

    comboMaterias2.change(function() {
        if (comboMaterias2.html() != '') {
            var parameters = {
                'forType' : 2,
                'idMateria' : comboMaterias2.val()
            };

            $.ajax({
                type: 'POST',
                url: '../Controllers/getGroupsForCourseController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var comboContent = ''

                    for (i = 0; i < jsonData.numGrupos; i++) {
                        comboContent += '<option value=' + jsonData[i].id + '>' + 'Grupo ' + jsonData[i].numero + '</option>';
                    }

                    posiblesGruposAlumno.html(comboContent);
                },
                error: function(message) {
                    feedback.html('Tema No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        }
    });

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

    crearMaestroButton.on('click', function() {
        if (nominaInput.val() != '' && passwordMaestroInput.val() != '' && nombreMaestroInput.val() != '' && apellidosMaestroInput.val() != '') {
            var groups = [];

            groups.push($('#selActualesMaestro option').length);

            $('#selActualesMaestro option').each(function() {
                groups.push($(this).prop('value'));
            });

            var parameters = {
                'forType' : 1,
                'username' : nominaInput.val(),
                'password' : passwordMaestroInput.val(),
                'nombre' : nombreMaestroInput.val(),
                'apellidos' : apellidosMaestroInput.val(),
                'grupos' : groups
            };

            $.ajax({
                type: 'POST',
                url: '../Controllers/createUserController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    feedback.html('Maestro Registrado');
                },
                error: function(message) {
                    feedback.html('Maestro No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        } else {
            feedback.html('Los campos \'Nómina\', \'Contraseña\', \'Nombre\' y \'Apellidos\' son obligatorios.')
        }

    });

    crearAlumnoButton.on('click', function() {
        if (matriculaInput.val() != '' && passwordAlumnoInput.val() != '' && nombreAlumnoInput.val() != '' && apellidosAlumnoInput.val() != '') {
            var groups = [];

            groups.push($('#selActualesAlumno option').length);

            $('#selActualesAlumno option').each(function() {
                groups.push($(this).prop('value'));
            });

            var parameters = {
                'forType' : 2,
                'username' :matriculaInput.val(),
                'password' : passwordAlumnoInput.val(),
                'nombre' : nombreAlumnoInput.val(),
                'apellidos' : apellidosAlumnoInput.val(),
                'grupos' : groups
            };

            $.ajax({
                type: 'POST',
                url: '../Controllers/createUserController.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    feedback.html('Alumno Registrado');
                },
                error: function(message) {
                    feedback.html('Alumno No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                }
            });
        } else {
            feedback.html('Los campos \'Matrícula\', \'Contraseña\', \'Nombre\' y \'Apellidos\' son obligatorios.')
        }

    });

});
</script>
<?php
include_once('../elements/footer.php');
?>
