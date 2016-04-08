<?php
$PageTitle="BajaCursosyGrupos";
include_once('../elements/header.php');

    # Establishing the connection to the Database
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Trivia";

        $connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($connection->connect_error) {
            return null;
        }
        else {
            return $connection;
        }
    }
?>

    <title>Contando Aciertos - Baja de Cursos y Grupos</title>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/footerHeader.css'>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/delCursosGrupos.css'>
    
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
					<h3 class="text-center">Baja</h3>
					<div class="row">
						<table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-5">Clave</th>
                                <th class="col-md-5">Nombre</th>
                                <th>¿Borrar?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $conn = connect();
                            
                                $sql = "SELECT * FROM Materia ORDER BY clave;";
                                
                                $result = $conn -> query($sql);
                                $num = $result->num_rows;
                                
                                while($num > 0) {
                                    $row = $result -> fetch_assoc();
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                            echo $row['clave'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['nombre'];
                                        ?>
                                    </td>
                                    <td>
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                </tr>
                            <?php
                                    $num = $num - 1;
                                }
                                $conn -> close();
                            ?>
                            </tbody>
                        </table>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="bajaCurso">Dar de baja cursos</button>
							</div>
						</div>
					</div>
				</div>

				<div id="grupos" class="tab-pane fade">
					<h3 class="text-center">Baja</h3>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
								<label for="selMateria">Materia:</label>
								<select class="form-control" id="selMateria">
                                    <?php
                                        $conn = connect();
                                    
                                        $sql = "SELECT * FROM Materia ORDER BY nombre;";
                                        
                                        $result = $conn -> query($sql);
                                        $num = $result->num_rows;
                                        
                                        while($num > 0) {
                                            $row = $result -> fetch_assoc();
                                    ?>
                                    <option value = <?php echo $row['idMateria']?>>
                                        <?php
                                            echo $row['nombre'];
                                        ?>
                                    </option>
                                    <?php
                                            $num = $num - 1;
                                        }
                                        
                                        $conn -> close();
                                    ?>
							  	</select>
						    </div>
						</div>
                        
                        <table class="table table-striped table-bordered" id="tablaBajasGrupos">
                            <thead>
                            <tr>
                                <th class="col-md-5">Número de Grupo</th>
                                <th class="col-md-5">Nombre de Maestro</th>
                                <th>¿Borrar?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Grupo 1</td>
                                <td>Maestro 1</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Grupo 2</td>
                                <td>Maestro 2</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Grupo 3</td>
                                <td>Maestro 3</td>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                            </tr>
                            </tbody>
                        </table>

						<div class="col-sm-2 col-sm-offset-5">
							<div class="form-group">
								<button class="btn btn-primary btn-lg" id="bajaGrupo">Dar de baja grupos</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#selMateria").change(function(){
            var 
            
            $("#tablaBajasGrupos").html("");
            
            var tabla = "<thead><tr>";
            tabla += "<th class=\"col-md-5\">Número de Grupo</th>";
            tabla += "<th class=\"col-md-5\">Nombre de Maestro</th>";
            tabla += "<th>¿Borrar?</th></tr></thead>";
            
            <?php
                $conn = connect();
            
                $sql = "SELECT * FROM Grupo WHERE ;";
                
                $result = $conn -> query($sql);
                $num = $result->num_rows;
                
                while($num > 0) {
                    $row = $result -> fetch_assoc();
            ?>
            <option value = <?php echo $row['clave']?>>
                <?php
                    echo $row['nombre'];
                ?>
            </option>
            <?php
                    $num = $num - 1;
                }
                
                $conn -> close();
            ?>
            
            $("#tablaBajasGrupos").html(tabla);
        }); 
    });
</script>