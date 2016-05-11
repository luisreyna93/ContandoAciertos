<?php
$PageTitle="BajaCursosyGrupos";
include_once('../elements/header.php');

    # Establishing the connection to the Database
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Trivia";

        $connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($connection->connect_error) {
            return null;
        }
        else {
            return $connection;
        }
    }
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
                            <tbody id = 'tablaCursos'>
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

                        <table class="table table-striped table-bordered" id="tablaBajasGrupos">
                            <thead>
                            <tr>
                                <th class="col-md-5">Número de Grupo</th>
                                <th class="col-md-5">Nombre de Maestro</th>
                                <th>¿Borrar?</th>
                            </tr>
                            </thead>
                            <tbody id = 'tablaGrupos'>
                            </tbody>
                        </table>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="bajaGrupo">Dar de baja grupos</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>

<?php
include_once('../elements/footer.php');
?>

<script type="text/javascript">
    $(document).ready(function(){
        var tableCourses = $('#tablaCursos');
        var tableGroups = $('#tablaGrupos');
        var comboCourses = $('#selMateria');
        var deleteCoursesButton = $('#bajaCurso');
        var deleteGroupsButton = $('#bajaGrupo');

        getCourses();

        function getCourses() {
            $.ajax({
                type: 'POST',
                url: '../Controllers/getCoursesController.php',
                dataType: 'json',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    var tableContent = '';
                    var comboContent = '';

                    for (i = 0; i < jsonData.numCursos; i++) {
                        tableContent += '<tr id = \'' + jsonData[i].id + '\'>';
                        tableContent += '<td>' + jsonData[i].clave + '</td>';
                        tableContent += '<td>' + jsonData[i].nombre + '</td>';
                        tableContent += '<td><label><input type="checkbox" value="" id=\'' + jsonData[i].id + '\'></label></td>';
                        tableContent += '</tr>';

                        comboContent += '<option value=' + jsonData[i].id + '>' + jsonData[i].nombre + '</option>';
                    }

                    tableCourses.html(tableContent);
                    comboCourses.html(comboContent);

                    if (comboContent != '') {
                        comboCourses.trigger('change');
                    }
                },
                error: function(message) {
                }
            });
        }

        comboCourses.change(function(){
            var parameters = {
                'idMateria': $(this).val(),
            }

            $.ajax({
                type: 'POST',
                url: '../Controllers/getGroupsForCourse2Controller.php',
                dataType: 'json',
                data: parameters,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                success: function(jsonData) {
                    tableContent = '';

                    for(var i = 0; i < jsonData.length; i++) {
                        tableContent += '<tr id = \'' + jsonData[i].id + '\'>';
                        tableContent += '<td>' + jsonData[i].grupo + '</td>';
                        tableContent += '<td>' + jsonData[i].nombreMaestro + '</td>';
                        tableContent += '<td><label><input type="checkbox" value="" id=\'' + jsonData[i].id + '\'></label></td>';
                        tableContent += '</tr>';
                    }

                    tableGroups.html(tableContent);
                },
                error: function(message) {
                }
            });
        });

        deleteCoursesButton.on('click', function() {
            var selected = [];

            $('#tablaCursos input:checked').each(function() {
                selected.push($(this).attr('id'));
            });

            for (i = 0; i < selected.length; i++) {
                var parameters = {
                    'id': selected[i],
                }

                $.ajax({
                    type: 'POST',
                    url: '../Controllers/deleteCoursesController.php',
                    dataType: 'json',
                    data: parameters,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    success: function(jsonData) {
                        $.notify('Curso Borrado', 'success');
                        getCourses();
                    },
                    error: function(message) {
                        $.notify('Curso No Borrado', 'error');
                    }
                });
            }
        });

        deleteGroupsButton.on('click', function() {
            var selected = [];

            $('#tablaGrupos input:checked').each(function() {
                selected.push($(this).attr('id'));
            });

            for (i = 0; i < selected.length; i++) {
                var parameters = {
                    'id': selected[i],
                }

                $.ajax({
                    type: 'POST',
                    url: '../Controllers/deleteGroupsController.php',
                    dataType: 'json',
                    data: parameters,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    success: function(jsonData) {
                        $.notify('Grupo Borrado', 'success');
                        comboCourses.trigger('change');
                    },
                    error: function(message) {
                        $.notify('Grupo No Borrado', 'error');
                    }
                });
            }
        });
    });
</script>
