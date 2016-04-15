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

	<div class="form-signin">
		<input type="hidden" name="action" value="login">
		<h2 class="form-signin-heading">Iniciar Sesión</h2>
		<label for="inputUsername" class="sr-only">Matrícula o Nómina</label>
		<input type="username" id="inputUsername" name="username" class="form-control" placeholder="A0+ / L0+" required autofocus>
		<label for="inputPassword" class="sr-only">Contraseña</label>
		<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit" id="logIn">Sign in</button>
	</div>

</div> <!-- /container -->

<script type = 'text/javascript'>
$(document).on('ready', function() {
	var loginButton = $("#logIn");
	var usernameInput = $("#inputUsername");
	var passwordInput = $("#inputPassword");

	$.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
			window.location.href = 'menu.php';
        },
        error: function(message) {
        }
    });

	loginButton.on('click', function() {
		var parameters = {
			'username' : usernameInput.val(),
			'password' : passwordInput.val()
		};

		$.ajax({
			type: 'POST',
			url: '../Controllers/loginController.php',
			dataType: 'json',
			data: parameters,
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			success: function(jsonData) {
				window.location.href = 'menu.php';
			},
			error: function(message) {
				alert("ERROR");
				// window.location.href = 'logIn.php';
			}
		});
	});

});

</script>

<?php
include_once('../elements/footer.php');
?>
