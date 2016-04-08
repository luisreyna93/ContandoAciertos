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
								<select class="form-control" id="selNomina" onchange="getTeacherDesc(this.value,this.options[this.selectedIndex].innerHTML)">
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
								<select class="form-control" id="selMateriaMaestro" onchange="getGroupFromMateria(this.value)">
							    	
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
 <script type = 'text/javascript'>
 	var idMaestro;
    $(document).on('ready', function() {
    	  $.ajax({
            type: 'POST',
            url: '../Controllers/getTeachersController.php',
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
                var comboContent = '';
                for (i = 0; i < jsonData.numMaestros; i++) {
                	var o = new Option(jsonData[i].nombre + ' ' + jsonData[i].apellido, jsonData[i].id );
					/// jquerify the DOM object 'o' so we can use the html method
					$(o).html(jsonData[i].nombre + ' ' + jsonData[i].apellido);
					$("#selNomina").append(o);
                }
    			getTeacherDesc($("#selNomina").val(),$("#selNomina option:selected").html());
            },
            error: function(message) {
            }
        });
    	  $.ajax({
            type: 'POST',
            url: '../Controllers/getMateriasController.php',
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
                var comboContent = '';
                for (i = 0; i < jsonData.numMaestros; i++) {
                	var o = new Option(jsonData[i].nombre , jsonData[i].id );
					/// jquerify the DOM object 'o' so we can use the html method
					$(o).html(jsonData[i].nombre);
					$("#selMateriaMaestro").append(o);
                }
    			getGroupFromMateria($("#selMateriaMaestro").val());
            },
            error: function(message) {
            }
        })
    });
    function getTeacherDesc(value,text){
    	idMaestro=value;
    	$("#nombreMaestro").val(text.split(" ")[0]);
    	$("#apellidosMaestro").val(text.split(" ")[1]);
    	$.ajax({
            type: 'POST',
            url: '../Controllers/getTeachersDescController.php',
            dataType: 'json',
            data: {"idMaestro": idMaestro},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
            	$("#selActualesMaestro").empty();
                for (i = 0; i < jsonData.numMaestros; i++) {
                	var o = new Option(jsonData[i].grupo , jsonData[i].id );
					/// jquerify the DOM object 'o' so we can use the html method
					$(o).html(jsonData[i].grupo );
					$("#selActualesMaestro").append(o);
                }
            },
            error: function(message) {
            }
        });
    }
    function getGroupFromMateria(value){
    	$("#selPosiblesMaestro").empty();
		$.ajax({
            type: 'POST',
            url: '../Controllers/getGroupsFromMaterias.php',
            dataType: 'json',
            data: {"idMateria": value},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            success: function(jsonData) {
                for (i = 0; i < jsonData.numMaestros; i++) {
                	var o = new Option(jsonData[i].grupo , jsonData[i].id );
					/// jquerify the DOM object 'o' so we can use the html method
					$(o).html(jsonData[i].grupo );
					$("#selPosiblesMaestro").append(o);
                }
            },
            error: function(message) {
            }
        });
    }
    </script>
<?php
include_once('../elements/footer.php');
?>