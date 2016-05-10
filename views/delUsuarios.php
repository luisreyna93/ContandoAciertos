<?php
$PageTitle="BajaUsuarios";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Baja de Usuarios</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/delUsuarios.css'>
</head>

<?php
include_once('../elements/nav.php');
?>

<body>
    <body>
        <div id="edicionUsuarios" class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a data-toggle="pill" href="#Maestros">Maestros</a></li>
                <li><a data-toggle="pill" href="#Alumnos">Alumnos</a></li>
            </ul>

            <div class="tab-content">
                <div id="Maestros" class="tab-pane fade in active">
                    <h3 class="text-center">Baja</h3>
                    <div class="row">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-4">Nómina</th>
                                    <th class="col-md-4">Nombre</th>
                                    <th class="col-md-4">Apellido</th>
                                    <th>¿Borrar?</th>
                                </tr>
                            </thead>
                            <tbody id = 'teachersTable'>
                            </tbody>
                        </table>
                        <div class="col-sm-2 col-sm-offset-5">
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg" id="bajaMaestro">Dar de baja maestro</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Alumnos" class="tab-pane fade">
                    <h3 class="text-center">Baja</h3>
                    <div class="row">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-4">Matrícula</th>
                                    <th class="col-md-4">Nombre</th>
                                    <th class="col-md-4">Apellido</th>
                                    <th>¿Borrar?</th>
                                </tr>
                            </thead>
                            <tbody id = 'studentsTable'>
                            </tbody>
                        </table>
                        <div class="col-sm-2 col-sm-offset-5">
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg" id="bajaAlumno">Dar de baja alumno</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
    $(document).on('ready', function() {
        var teachersTable = $("#teachersTable");
        var studentsTable = $("#studentsTable");
        var deleteTeachersButton = $('#bajaMaestro');
        var deleteStudentsButton = $('#bajaAlumno');

        getTeachers();
        getStudents();

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

        function getTeachers() {
            $.ajax({
                type: 'POST',
                url: '../Controllers/getTeachersController.php',
                dataType: 'json',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var tableContent = '';

                    for (i = 0; i < jsonData.numMaestros; i++) {
                        tableContent += '<tr id = \'' + jsonData[i].id + '\'>';
                        tableContent += '<td>' + jsonData[i].username + '</td>';
                        tableContent += '<td>' + jsonData[i].nombre + '</td>';
                        tableContent += '<td>' + jsonData[i].apellido + '</td>';
                        tableContent += '<td><label><input type="checkbox" value="" id=\'' + jsonData[i].id + '\'></label></td>';
                        tableContent += '</tr>';
                    }

                    teachersTable.html(tableContent);
                },
                error: function(message) {
                }
            });
        }

        function getStudents() {
            $.ajax({
                type: 'POST',
                url: '../Controllers/getStudentsController.php',
                dataType: 'json',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var tableContent = '';

                    for (i = 0; i < jsonData.numAlumnos; i++) {
                        tableContent += '<tr id = \'' + jsonData[i].id + '\'>';
                        tableContent += '<td>' + jsonData[i].username + '</td>';
                        tableContent += '<td>' + jsonData[i].nombre + '</td>';
                        tableContent += '<td>' + jsonData[i].apellido + '</td>';
                        tableContent += '<td><label><input type="checkbox" value="" id=\'' + jsonData[i].id + '\'></label></td>';
                        tableContent += '</tr>';
                    }

                    studentsTable.html(tableContent);
                },
                error: function(message) {
                }
            });
        }

        deleteTeachersButton.on('click', function() {
            var selected = [];

            $('#teachersTable input:checked').each(function() {
                selected.push($(this).attr('id'));
            });

            for (i = 0; i < selected.length; i++) {
                var parameters = {
                    'id': selected[i],
                }

                $.ajax({
                    type: 'POST',
                    url: '../Controllers/deleteTeachersController.php',
                    dataType: 'json',
                    data: parameters,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    success: function(jsonData) {
                        getTeachers();
                    },
                    error: function(message) {
                    }
                });
            }
        });

        deleteStudentsButton.on('click', function() {
            var selected = [];

            $('#studentsTable input:checked').each(function() {
                selected.push($(this).attr('id'));
            });

            for (i = 0; i < selected.length; i++) {
                var parameters = {
                    'id': selected[i],
                }

                $.ajax({
                    type: 'POST',
                    url: '../Controllers/deleteStudentsController.php',
                    dataType: 'json',
                    data: parameters,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    success: function(jsonData) {
                        alert('sucess');
                        getStudents();
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
