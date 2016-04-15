<nav class='navbar navbar-default navbar-fixed-top'>
    <div class='container-fluid'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='menu.php'>Contando Aciertos</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav'>
                <li><a href='menu.php'>Menú</a></li>
                <li><a href='juego.php'>Juego</a></li>
                <li><a href='puntaje.php'>Puntaje</a></li>
                <li class='dropdown' id='altas'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Registros <span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href='regCursosGrupos.php'>Cursos y Grupos</a></li>
                        <li><a href='regUsuarios.php'>Usuarios</a></li>
                        <li><a href='regContenido.php'>Contenido</a></li>
                    </ul>
                </li>
                <li class='dropdown' id='bajas'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Bajas <span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href='delCursosGrupos.php'>Cursos y Grupos</a></li>
                        <li><a href='delUsuarios.php'>Usuarios</a></li>
                        <li><a href='delContenido.php'>Contenido</a></li>
                    </ul>
                </li>
                <li class='dropdown' id='edicion'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Edición <span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href='edCursosGrupos.php'>Cursos y Grupos</a></li>
                        <li><a href='edUsuarios.php'>Usuarios</a></li>
                        <li><a href='edContenido.php'>Contenido</a></li>
                    </ul>
                </li>
            </ul>
            <ul id = 'logOutButton' class='nav navbar-nav navbar-right'>
                <li><a href='logIn.php'>Cerrar Sesión <span class='glyphicon glyphicon-log-out'></span></a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<script type = 'text/javascript'>
$(document).on('ready', function() {
    var welcomeMessage = $('#welcomeMessage');
    var logOutButton = $('#logOutButton');
    var menuAltas = $('#altas');
    var menuBajas = $('#bajas');
    var menuEdicion = $('#edicion');

    $.ajax({
        type: 'POST',
        url: '../Controllers/sessionController.php',
        dataType: 'json',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(jsonData) {
            if (jsonData.tipo != 'admin') {
                menuAltas.addClass('hidden');
                menuBajas.addClass('hidden');
                menuEdicion.addClass('hidden');
            }
        },
        error: function(message) {
            window.location.href = 'logIn.php';
        }
    });

    logOutButton.on('click', function() {
        $.ajax({
            type: 'POST',
            url: '../Controllers/logoutController.php',
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        });
    });
});

</script>
