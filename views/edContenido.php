<?php
$PageTitle="EdicionContenido";
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Edición de Contenido</title>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/edContenido.css'>
    </head>

    <?php
        include_once('../elements/nav.php');
    ?>

    <body>
    	<div id="edicionContenido" class="container">
	    	<ul class="nav nav-pills nav-justified">
				<li class="active"><a data-toggle="pill" href="#Temas">Temas</a></li>
				<li><a data-toggle="pill" href="#Preguntas">Preguntas</a></li>
			</ul>

			<div class="tab-content">
				<div id="Temas" class="tab-pane fade in active">
					<h3 class="text-center">Edición</h3>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<div class="form-group">
								<label for="selMateria">Materia:</label>
								<select class="form-control" id="selMateria">
							    	<option>Materia 1</option>
							    	<option>Materia 2</option>
							    	<option>Materia 3</option>
							    	<option>Materia 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-6 col-sm-offset-3">
							<div class="form-group">
								<label for="selTema">Tema anterior:</label>
								<select class="form-control" id="selTema">
							    	<option>Tema 1</option>
							    	<option>Tema 2</option>
							    	<option>Tema 3</option>
							    	<option>Tema 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-6 col-sm-offset-3">
							<label>Tema nuevo:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="tema"/>
							</div>
						</div>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="editarTema">Editar tema</button>
							</div>
						</div>
					</div>
				</div>
				<div id="Preguntas" class="tab-pane fade">
					<h3 class="text-center">Edición</h3>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<div class="form-group">
								<label for="selMateria2">Materia:</label>
								<select class="form-control" id="selMateria2">
							    	<option>Materia 1</option>
							    	<option>Materia 2</option>
							    	<option>Materia 3</option>
							    	<option>Materia 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-6 col-sm-offset-3">
							<div class="form-group">
								<label for="selTema2">Tema:</label>
								<select class="form-control" id="selTema2">
							    	<option>Tema 1</option>
							    	<option>Tema 2</option>
							    	<option>Tema 3</option>
							    	<option>Tema 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-6 col-sm-offset-3">
							<div class="form-group">
								<label for="selPregunta">Pregunta anterior:</label>
								<select class="form-control" id="selPregunta">
							    	<option>Pregunta 1</option>
							    	<option>Pregunta 2</option>
							    	<option>Pregunta 3</option>
							    	<option>Pregunta 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-6 col-sm-offset-3">
							<label>Pregunta nueva:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="pregunta"/>
							</div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<label>Opción A (Correcta):</label>
							<div class="form-group">
								<input type="text" class="form-control" id="opcionA"/>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Opción B:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="opcionB"/>
							</div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<label>Opción C:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="opcionC"/>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Opción D:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="opcionD"/>
							</div>
						</div>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="editarPregunta">Editar pregunta</button>
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