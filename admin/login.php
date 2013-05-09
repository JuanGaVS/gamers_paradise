<?php


function login($username, $password) {

    require_once '../entities/User.php';

    $user = new User();
    $login_success = $user->user_login($username, $password);

    if ($login_success) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: admin.php');
        return '1';
    } else {
        echo 'ERROR';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    login($_POST['username'], $_POST['password']);
}/*
  elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if($_SESSION['username'] != '' || $_SESSION['username'] != NULL ){
  header('Location: admin.php');
  }
  } */
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Iniciar Sesión</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
    </head>

    <body>
        <div id="wrapper">
            <div id="title">
                <h1 class="titles">GAMERS PARADISE</h1>
            </div>
            <div id="content">
                <div id="login">
                    <form id="login" method="post" action="login.php">
                        <div id="login-username">
                            <label class="labels" for="username">Nombre de Usuario:</label> <br/>
                            <input id="username" name="username" type="text" autocomplete="off"/>
                        </div>
                        <div id="login-password">
                            <label class="labels" for="password">Contraseña:</label> <br/>
                            <input id="password" name="password" type="password"/>
                        </div>
                        <div id="login-submit-div">
                            <input class="labels" id="login-subit" name="login" type="submit" value="Ingresar"/>
                        </div>

                        <div id="error">
                            <span class="error" id="error"></span>
                        </div>

                    </form>

                </div>
            </div>
            <div id="footer">
                <h2 id="footer-title"><a href="#">PRIVACIDAD</a> | <a href="#">REGLAS</a></h2>
                <p class="information">Lorem ipsum dolor sit anet blablalba</p>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>