<?php
$PageTitle="BajaContenido";
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Baja de Contenido</title>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/delContenido.css'>
    </head>

    <?php
        include_once('../elements/nav.php');
    ?>

    <body>
    	<div id="bajaContenido" class="container">
	    	<ul class="nav nav-pills nav-justified">
				<li class="active"><a data-toggle="pill" href="#Temas">Temas</a></li>
				<li><a data-toggle="pill" href="#Preguntas">Preguntas</a></li>
			</ul>

			<div class="tab-content">
				<div id="Temas" class="tab-pane fade in active">
					<h3 class="text-center">Baja</h3>
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
						<table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-9">Tema</th>
                                <th>¿Borrar?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Tema 1</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Tema 2</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Tema 3</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="bajaTema">Dar de baja temas</button>
							</div>
						</div>
					</div>
				</div>
				<div id="Preguntas" class="tab-pane fade">
					<h3 class="text-center">Baja</h3>
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
						<table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-5">Pregunta</th>
                                <th>Opción A (Correcta)</th>
                                <th>Opción B</th>
                                <th>Opción C</th>
                                <th>Opción D</th>
                                <th>¿Borrar?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Pregunta 1</td>
                                <td>Opción A</td>
                                <td>Opción B</td>
                                <td>Opción C</td>
                                <td>Opción D</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Pregunta 2</td>
                                <td>Opción A</td>
                                <td>Opción B</td>
                                <td>Opción C</td>
                                <td>Opción D</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Pregunta 3</td>
                                <td>Opción A</td>
                                <td>Opción B</td>
                                <td>Opción C</td>
                                <td>Opción D</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="bajaPregunta">Dar de baja preguntas</button>
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