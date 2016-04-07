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
								<button class="btn btn-primary btn-md" id="moverGruposDerecha">Agregar <span class="glyphicon glyphicon-arrow-right"></span></button>
								<button class="btn btn-primary btn-md" id="moverGruposIzquierda">Quitar <span class="glyphicon glyphicon-arrow-left"></span></button>
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
            // var claveInput = $('#claveCurso');
            // var nombreInput = $('#nombreCurso');
            // var crearGrupoButton = $('#crearGrupo');
            // var crearCursoButton = $('#crearCurso');
            var comboMaterias = $('#selMateriaMaestro');
            var comboMaterias2 = $('#selMateriaAlumno');
            var posiblesGruposMaestro = $("#selPosiblesMaestro");
            var posiblesGruposAlumno = $("#selPosiblesAlumno");
            // var grupoInput = $('#nombreGrupo');
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
                    comboMaterias2.html(comboContent);

                    comboMaterias.trigger('change');
                    comboMaterias2.trigger('change');
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

        });
    </script>
<?php
include_once('../elements/footer.php');
?>
