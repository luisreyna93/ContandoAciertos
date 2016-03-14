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
    	<div id="registroAlumnos" class="container">
	    	<ul class="nav nav-pills nav-justified">
				<li class="active"><a data-toggle="pill" href="#Maestros">Maestros</a></li>
				<li><a data-toggle="pill" href="#Alumnos">Alumnos</a></li>
			</ul>

			<div class="tab-content">
				<div id="Maestros" class="tab-pane fade in active">
					Maestros
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