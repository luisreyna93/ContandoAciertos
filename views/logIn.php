<?php
$PageTitle="LogIn";
include_once('../elements/header.php');
?>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/logIn.css" rel="stylesheet">

    <title>Contando Aciertos - Inicio de Sesión</title>

    </head>

    <div class="container">

    <h1 class="title-heading">Contando Aciertos</h1>

      <form class="form-signin" action="../Controllers/loginController.php">
        <input type="hidden" name="action" value="login">
      	<h2 class="form-signin-heading">Iniciar Sesión</h2>
        <label for="inputUsername" class="sr-only">Matrícula o Nómina</label>
        <input type="username" id="inputUsername" name="username" class="form-control" placeholder="A0+ / L0+" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Guardar Sesión
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

<?php
include_once('../elements/footer.php');
?>
