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
                            <tbody>
                                <tr>
                                    <td>Nómina 1</td>
                                    <td>Nombre 1</td>
                                    <td>Apellido 1</td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nómina 2</td>
                                    <td>Nombre 2</td>
                                    <td>Apellido 2</td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nómina 3</td>
                                    <td>Nombre 3</td>
                                    <td>Apellido 3</td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
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
                            <tbody>
                                <tr>
                                    <td>Matrícula 1</td>
                                    <td>Nombre 1</td>
                                    <td>Apellido 1</td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Matrícula 2</td>
                                    <td>Nombre 2</td>
                                    <td>Apellido 2</td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Matrícula 3</td>
                                    <td>Nombre 3</td>
                                    <td>Apellido 3</td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
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
    });
    </script>

    <?php
    include_once('../elements/footer.php');
    ?>
