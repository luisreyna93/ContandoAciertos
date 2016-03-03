<?php
$PageTitle="LogIn";
include_once('../elements/header.php');
?>

	<link href="../css/bootstrap.min.css" rel="stylesheet">

    <title>Contando Aciertos - Inicio de Sesión</title>
    
    </head>

    <div class="container">

      <form class="form-signin" action="menu.php">
      	<h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

<?php
include_once('../elements/footer.php');
?>