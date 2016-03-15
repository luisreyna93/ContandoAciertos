<?php
$PageTitle="RegistroUsuarios";
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Registro Usuarios</title>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
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
							<div class="form-group">
								<label for="sel1">Select list:</label>
								<select class="form-control" id="sel1">
							    	<option>1</option>
							    	<option>2</option>
							    	<option>3</option>
							    	<option>4</option>
							  	</select>
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