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
    	<div class="container">
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
						<label for="selTema">Tema:</label>
						<select class="form-control" id="selTema">
					    	<option>Tema 1</option>
					    	<option>Tema 2</option>
					    	<option>Tema 3</option>
					    	<option>Tema 4</option>
					  	</select>
				    </div>
				</div>
				<div class="col-sm-6 col-sm-offset-3">
					<label>Pregunta:</label>
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
						<button class="btn btn-primary btn-lg" id="editarrPregunta">Editar pregunta</button>
					</div>
				</div>
			</div>
		</div>
    </body>

<?php
include_once('../elements/footer.php');
?>