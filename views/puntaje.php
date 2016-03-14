<?php
$PageTitle = 'Puntaje';
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Puntaje</title>
    <script type = 'text/javascript' src = '../js/puntaje.js'></script>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/puntaje.css'>
  </head>

  <?php
      include_once('../elements/nav.php');
  ?>

  <body>
    </br></br></br>
    <link rel = 'import' href = '../elements/comboBox.html'>
    <div class = 'container'>
      <center><h1> Tabla de Puntajes </h1></center>
      </br></br></br>
      <div id = 'comboBox-selectors'>
        <label class='col-xs-3 control-label'>Materia</label>
          <div class='col-xs-5 selectContainer'>
              <select class='form-control' name='color'>
                  <option value=''>Elije una materia</option>
                  <option value='black'>1</option>
                  <option value='green'>2</option>
                  <option value='red'>3</option>
              </select>
          </div>
          </br></br>
          <label class='col-xs-3 control-label'>Tema</label>
            <div class='col-xs-5 selectContainer'>
                <select class='form-control' name='color'>
                    <option value=''>Elije un tema</option>
                    <option value='black'>1</option>
                    <option value='green'>2</option>
                    <option value='red'>3</option>
                </select>
            </div>
      </div>
      </br></br></br>
			<div class = 'col-md-15'>
				<div class = 'panel panel-success'>
					<div class = 'panel-heading'>
						<h3 class = 'panel-title'>Resultados</h3>
						<div class = 'pull-right'>
							<span class = 'clickable filter' data-toggle = 'tooltip' title = 'Toggle table filter' data-container = 'body'>
								<i class = 'glyphicon glyphicon-filter'></i>
							</span>
						</div>
					</div>
					<div class = 'panel-body'>
						<input type = 'text' class = 'form-control' id = 'task-table-filter' data-action = 'filter' data-filters = '#task-table' placeholder = 'Filter Tasks' />
					</div>
					<table class = 'table table-hover' id = 'task-table'>
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Materia</th>
								<th>Grupo</th>
                <th>Profesor</th>
                <th>Tema</th>
                <th>Puntaje</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Site Wireframes</td>
								<td>John Smith</td>
								<td>in progress</td>
                <td>Site Wireframes</td>
								<td>John Smith</td>
								<td>in progress</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Mobile Landing Page</td>
								<td>Kilgore Trout</td>
								<td>completed</td>
                <td>Mobile Landing Page</td>
								<td>Kilgore Trout</td>
								<td>completed</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Add SEO tags</td>
								<td>Bob Loblaw</td>
								<td>failed qa</td>
                <td>Add SEO tags</td>
								<td>Bob Loblaw</td>
								<td>failed qa</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Migrate to Bootstrap 3</td>
								<td>Emily Hoenikker</td>
								<td>in progress</td>
                <td>Migrate to Bootstrap 3</td>
								<td>Emily Hoenikker</td>
								<td>in progress</td>
							</tr>
							<tr>
								<td>5</td>
								<td>Update jQuery library</td>
								<td>Holden Caulfield</td>
								<td>deployed</td>
                <td>Update jQuery library</td>
								<td>Holden Caulfield</td>
								<td>deployed</td>
							</tr>
							<tr>
								<td>6</td>
								<td>Issues in IE7</td>
								<td>Jane Doe</td>
								<td>failed qa</td>
                <td>Issues in IE7</td>
								<td>Jane Doe</td>
								<td>failed qa</td>
							</tr>
							<tr>
								<td>7</td>
								<td>Bugs from Sprint 14</td>
								<td>Kilgore Trout</td>
								<td>completed</td>
                <td>Bugs from Sprint 14</td>
								<td>Kilgore Trout</td>
								<td>ljasfjasf</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	 </div>
  </body>

<?php
include_once('../elements/footer.php');
?>
