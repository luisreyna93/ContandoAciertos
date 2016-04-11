<?php
$PageTitle="BajaCursosyGrupos";
include_once('../elements/header.php');
?>

<title>Contando Aciertos - Baja de Cursos y Grupos</title>
<link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
<link type = 'text/css' rel = 'stylesheet' href = '../css/delCursosGrupos.css'>
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
                <h3 class="text-center">Baja</h3>
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-5">Clave</th>
                                <th class="col-md-5">Nombre</th>
                                <th>¿Borrar?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Clave 1</td>
                                <td>Nombre 1</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Clave 2</td>
                                <td>Nombre 2</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Clave 3</td>
                                <td>Nombre 3</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="bajaCurso">Dar de baja cursos</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="grupos" class="tab-pane fade">
                <h3 class="text-center">Baja</h3>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="form-group">
                            <label for="selMateria">Materia:</label>
                            <select class="form-control" id="selMateria">
                            </select>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-5">Número de Grupo</th>
                                <th class="col-md-5">Nombre de Maestro</th>
                                <th>¿Borrar?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Grupo 1</td>
                                <td>Maestro 1</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Grupo 2</td>
                                <td>Maestro 2</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Grupo 3</td>
                                <td>Maestro 3</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="col-sm-2 col-sm-offset-5">
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg" id="bajaGrupo">Dar de baja grupos</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id = 'feedback' class = 'text-center'>
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
