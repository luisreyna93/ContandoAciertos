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
								<select class="form-control" id="selNomina">
							    	<option>L01234567</option>
							    	<option>L01234568</option>
							    	<option>L01234569</option>
							    	<option>L01234570</option>
							  	</select>
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
							    	<option>Materia 1</option>
							    	<option>Materia 2</option>
							    	<option>Materia 3</option>
							    	<option>Materia 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-2  col-sm-offset-3">
							<div class="form-group">
								<label for="selPosiblesMaestro">Grupos posibles:</label>
								<select multiple class="form-control" id="selPosiblesMaestro">
							    	<option>Grupo 1</option>
							    	<option>Grupo 2</option>
							    	<option>Grupo 3</option>
							    	<option>Grupo 4</option>
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
							    	<option>Grupo 1</option>
							    	<option>Grupo 2</option>
							    	<option>Grupo 3</option>
							    	<option>Grupo 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="editarMaestro">Editar maestro</button>
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
								<select class="form-control" id="selMatricula">
							    	<option>A01234567</option>
							    	<option>A01234568</option>
							    	<option>A01234569</option>
							    	<option>A01234570</option>
							  	</select>
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
							    	<option>Materia 1</option>
							    	<option>Materia 2</option>
							    	<option>Materia 3</option>
							    	<option>Materia 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-2  col-sm-offset-3">
							<div class="form-group" id="gruposPosibles">
								<label for="selPosiblesAlumno">Grupos posibles:</label>
								<select class="form-control" id="selPosiblesAlumno">
							    	<option>Grupo 1</option>
							    	<option>Grupo 2</option>
							    	<option>Grupo 3</option>
							    	<option>Grupo 4</option>
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
							    	<option>Grupo 1</option>
							    	<option>Grupo 2</option>
							    	<option>Grupo 3</option>
							    	<option>Grupo 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="editarAlumno">Editar alumno</button>
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