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
							<label>Email:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="email" placeholder="L01234567@itesm.mx"/>
							</div>
							<label>Contraseña:</label>
							<div class="form-group">
								<input type="password" class="form-control" id="password" placeholder="********"/>
							</div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<label>Nombre:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="nombre" placeholder="José"/>
							</div>
						</div>
						<div class="col-sm-3">
							<label>Apellidos:</label>
							<div class="form-group">
								<input type="text" class="form-control" id="apellidos" placeholder="González"/>
							</div>
						</div>
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
						<div class="col-sm-2  col-sm-offset-3">
							<div class="form-group">
								<label for="selPosibles">Grupos posibles:</label>
								<select multiple class="form-control" id="selPosibles">
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
								<label for="selActuales">Grupos actuales:</label>
								<select multiple class="form-control" id="selActuales">
							    	<option>Grupo 1</option>
							    	<option>Grupo 2</option>
							    	<option>Grupo 3</option>
							    	<option>Grupo 4</option>
							  	</select>
						    </div>
						</div>
						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="moverGruposDerecha">Crear maestro</button>
							</div>
						</div>
					</div>
				</div>
				<div id="Alumnos" class="tab-pane fade">
					Alumnos
				</div>
			</div>
		</div>
    </body>

<?php
include_once('../elements/footer.php');
?>