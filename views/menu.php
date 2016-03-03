<?php
$PageTitle="LogIn";
include_once('../elements/header.php');
?>

    <title>Contando Aciertos - Menú</title>
    </head>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Contando Aciertos</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="menu.php">Menú <span class="sr-only">(current)</span></a></li>
                    <li><a href="juego.php">Juego</a></li>
                    <li><a href="puntaje.php">Puntaje</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="registroUsuario.php">Cursos y Grupos</a></li>
                            <li><a href="registroUsuario.php">Usuarios</a></li>
                            <li><a href="registroContenido.php">Contenido</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bajas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="registroUsuario.php">Cursos y Grupos</a></li>
                            <li><a href="registroUsuario.php">Usuarios</a></li>
                            <li><a href="registroContenido.php">Contenido</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Edición <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="registroUsuario.php">Cursos y Grupos</a></li>
                            <li><a href="registroUsuario.php">Usuarios</a></li>
                            <li><a href="registroContenido.php">Contenido</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="quienessomos.php">Cerrar Sesión</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <body>

<?php
include_once('../elements/footer.php');
?>