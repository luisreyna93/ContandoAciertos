<?php
$PageTitle="RegistroCursosyGrupos";
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Registro Cursos y Grupos</title>
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
					<h3 class="text-center">Registro</h3>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-3">
							<label>Nombre:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="nombreCurso"/>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Clave:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="claveCurso" />
							</div>
						</div>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="crearCurso">Registrar Curso</button>
							</div>
						</div>
					</div>
				</div>

				<div id="grupos" class="tab-pane fade">
					<h3 class="text-center">Edición</h3>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
								<label for="selMateria">Materia:</label>
								<select class="form-control" id="selMateria">
							  	</select>
						    </div>
							<label>Grupo:</label>
							<div class="form-group">
								<input type="input" class="form-control" id="nombreGrupo" />
							</div>
							<div class="form-group">
								<label for="selMaestro">Maestro:</label>
								<select class="form-control" id="selMaestro">
							  	</select>
						    </div>
						</div>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="crearGrupo">Registrar Grupo</button>
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
    $(document).on('ready', function() {
        var claveInput = $('#claveCurso');
        var nombreInput = $('#nombreCurso');
        var crearGrupoButton = $('#crearGrupo');
        var crearCursoButton = $('#crearCurso');
        var comboMaterias = $('#selMateria');
        var comboMaestros = $('#selMaestro');
        var grupoInput = $('#nombreGrupo');
        var feedback = $('#feedback');

        $.ajax({
            type: 'POST',
            url: '../Controllers/sessionController.php',
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
                feedback.html('');
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
            },
            error: function(message) {
            }
        });

        $.ajax({
            type: 'POST',
            url: '../Controllers/getTeachersController.php',
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
                var comboContent = ''

                for (i = 0; i < jsonData.numMaestros; i++) {
                    comboContent += '<option value=' + jsonData[i].id + '>' + jsonData[i].nombre + ' ' + jsonData[i].apellido +'</option>';
                }

                comboMaestros.html(comboContent);
            },
            error: function(message) {
            }
        });

        crearCursoButton.on('click', function() {
            var parameters = {
                'nombre' : nombreInput.val(),
                'clave' : claveInput.val()
            };

            if (nombreInput.val() != '' && claveInput.val() != '') {
                $.ajax({
                    type: 'POST',
                    url: '../Controllers/createCourseController.php',
                    dataType: 'json',
                    data: parameters,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    success: function(jsonData) {
                        feedback.html('Curso Registrado');
                    },
                    error: function(message) {
                        feedback.html('Curso No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                    }
                });
            }  else {
                feedback.html('Los campos \'Curso\' y \'Clave\' son obligatorios');
            }
        });

        crearGrupoButton.on('click', function() {
            var parameters = {
                'idMateria' : comboMaterias.val(),
                'idMaestro' : comboMaestros.val(),
                'grupo' : grupoInput.val()
            };

            if (grupoInput.val() != "") {
                $.ajax({
                    type: 'POST',
                    url: '../Controllers/createGroupController.php',
                    dataType: 'json',
                    data: parameters,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    success: function(jsonData) {
                        feedback.html('Grupo Registrado');
                    },
                    error: function(message) {
                        feedback.html('Grupo No Registrado<br>Verifique la existencia previa o la conexión a la Base de Datos');
                    }
                });
            } else {
                feedback.html('El campo \'Grupo\' es obligatorio');
            }
        });

    });

    </script>

<?php
include_once('../elements/footer.php');
?>
