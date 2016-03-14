<?php
$PageTitle='Juego';
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Juego</title>
    </head>

    <?php
        include_once('../elements/nav.php');
    ?>
  </br></br></br>
  <div id = 'menu' class = 'container'>
    <center><h1> Tabla de Puntajes </h1></center>
    </br></br></br>
    <div id = 'comboBox-selectors'>
      <label class='col-xs-3 control-label'>Materia</label>
        <div class='col-xs-5 selectContainer'>
            <select class='form-control' name='materia'>
                <option value=''>Elije una materia</option>
                <option value='black'>1</option>
                <option value='green'>2</option>
                <option value='red'>3</option>
            </select>
        </div>
        </br></br>
        <label class='col-xs-3 control-label'>Tema</label>
          <div class='col-xs-5 selectContainer'>
              <select class='form-control' name='tema'>
                  <option value=''>Elije un tema</option>
                  <option value='black'>1</option>
                  <option value='green'>2</option>
                  <option value='red'>3</option>
              </select>
          </div>
    </div>
    </br></br></br>
    <div class='form-group'>
        <div class='col-xs-5 col-xs-offset-6'>
            <button type='submit' class='btn btn-default'>Comenzar juego</button>
        </div>
    </div>

    <body>

<?php
include_once('../elements/footer.php');
?>
