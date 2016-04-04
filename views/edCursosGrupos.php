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
					<h3 class="text-center">Edicion</h3>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-3">
							<label>Nombre:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="nombreCurso"/>
							</div>
						</div>
						<div class="col-sm-3">
                            <div class="form-group">
								<label for="selClave">Clave:</label>
								<select class="form-control" id="selClave">
							  	</select>
						    </div>
						</div>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="crearCurso">Editar Curso</button>
							</div>
						</div>
					</div>
				</div>

				<div id="grupos" class="tab-pane fade">
					<h3 class="text-center">Edicion</h3>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
								<label for="selMateria">Materia:</label>
								<select class="form-control" id="selMateria">
							  	</select>
						    </div>
							<div class="form-group">
								<label for="selGrupo">Grupo:</label>
								<select class="form-control" id="selGrupo">
							  	</select>
						    </div>
							<div class="form-group">
								<label for="selMaestro">Maestro:</label>
								<select class="form-control" id="selMaestro">
							  	</select>
						    </div>
						</div>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="crearGrupo">Editar Grupo</button>
							</div>
						</div>
					</div>
				</div>
                <div id = 'feedback' class = 'text-center'>
                </div>
			</div>
		</div>
    </body>

<?php
include_once('../elements/footer.php');
?>
