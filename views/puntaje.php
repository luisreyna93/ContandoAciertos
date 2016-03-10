<?php
$PageTitle='Puntaje';
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Puntaje</title>
    <script type = 'text/javascript' src = '../js/puntaje.js'></script>
    <link type = 'text/css' rel = 'stylesheet' href = '../css/puntaje.css'
    </script>
    </head>

    <?php
        include_once('../elements/nav.php');
    ?>

    <body>
      </br></br></br>
      <div class='container'>
        <h1>Click the filter icon <small>(<i class='glyphicon glyphicon-filter'></i>)</small></h1>
        	<div class='row'>
    			<div class='col-md-6'>
    				<div class='panel panel-primary'>
    					<div class='panel-heading'>
    						<h3 class='panel-title'>Developers</h3>
    						<div class='pull-right'>
    							<span class='clickable filter' data-toggle='tooltip' title='Toggle table filter' data-container='body'>
    								<i class='glyphicon glyphicon-filter'></i>
    							</span>
    						</div>
    					</div>
    					<div class='panel-body'>
    						<input type='text' class='form-control' id='dev-table-filter' data-action='filter' data-filters='#dev-table' placeholder='Filter Developers' />
    					</div>
    					<table class='table table-hover' id='dev-table'>
    						<thead>
    							<tr>
    								<th>#</th>
    								<th>First Name</th>
    								<th>Last Name</th>
    								<th>Username</th>
    							</tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td>1</td>
    								<td>Kilgore</td>
    								<td>Trout</td>
    								<td>kilgore</td>
    							</tr>
    							<tr>
    								<td>2</td>
    								<td>Bob</td>
    								<td>Loblaw</td>
    								<td>boblahblah</td>
    							</tr>
    							<tr>
    								<td>3</td>
    								<td>Holden</td>
    								<td>Caulfield</td>
    								<td>penceyreject</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    			<div class='col-md-6'>
    				<div class='panel panel-success'>
    					<div class='panel-heading'>
    						<h3 class='panel-title'>Tasks</h3>
    						<div class='pull-right'>
    							<span class='clickable filter' data-toggle='tooltip' title='Toggle table filter' data-container='body'>
    								<i class='glyphicon glyphicon-filter'></i>
    							</span>
    						</div>
    					</div>
    					<div class='panel-body'>
    						<input type='text' class='form-control' id='task-table-filter' data-action='filter' data-filters='#task-table' placeholder='Filter Tasks' />
    					</div>
    					<table class='table table-hover' id='task-table'>
    						<thead>
    							<tr>
    								<th>#</th>
    								<th>Task</th>
    								<th>Assignee</th>
    								<th>Status</th>
    							</tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td>1</td>
    								<td>Site Wireframes</td>
    								<td>John Smith</td>
    								<td>in progress</td>
    							</tr>
    							<tr>
    								<td>2</td>
    								<td>Mobile Landing Page</td>
    								<td>Kilgore Trout</td>
    								<td>completed</td>
    							</tr>
    							<tr>
    								<td>3</td>
    								<td>Add SEO tags</td>
    								<td>Bob Loblaw</td>
    								<td>failed qa</td>
    							</tr>
    							<tr>
    								<td>4</td>
    								<td>Migrate to Bootstrap 3</td>
    								<td>Emily Hoenikker</td>
    								<td>in progress</td>
    							</tr>
    							<tr>
    								<td>5</td>
    								<td>Update jQuery library</td>
    								<td>Holden Caulfield</td>
    								<td>deployed</td>
    							</tr>
    							<tr>
    								<td>6</td>
    								<td>Issues in IE7</td>
    								<td>Jane Doe</td>
    								<td>failed qa</td>
    							</tr>
    							<tr>
    								<td>7</td>
    								<td>Bugs from Sprint 14</td>
    								<td>Kilgore Trout</td>
    								<td>completed</td>
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
