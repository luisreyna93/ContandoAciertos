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
				<li class="active"><a data-toggle="pill" href="#Maestros">Cursos</a></li>
				<li><a data-toggle="pill" href="#Alumnos">Grupos</a></li>
			</ul>

			<div class="tab-content">
				<div id="Maestros" class="tab-pane fade in active">
					<h3 class="text-center">Edición</h3>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-3">
							<label>Nombre:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="nombreMaestro"/>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Clave:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="apellidosMaestro" />
							</div>
						</div>
						
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="editarAlumno">Registrar Curso</button>
							</div>
						</div>
					</div>
				</div>

				<div id="Alumnos" class="tab-pane fade">
					<h3 class="text-center">Edición</h3>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<label>Nombre:</label>
							<div class="form-group">
								<input type="input" class="form-control" id="passwordAlumno" />
							</div>
							<div class="form-group">
								<label for="selMatricula">Grupo:</label>
								<select class="form-control" id="selMatricula">
							    	<option>Grupo1</option>
							    	<option>Grupo1</option>
							    	<option>Grupo1</option>
							    	<option>Grupo1</option>
							  	</select>
						    </div>

							<div class="form-group">
								<label for="selMatricula">Maestro:</label>
								<select class="form-control" id="selMatricula">
							    	<option>Maestro1</option>
							    	<option>Maestro1</option>
							    	<option>Maestro1</option>
							    	<option>Maestro1</option>
							  	</select>
						    </div>
						</div>
						
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="editarAlumno">Registrar Grupo</button>
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