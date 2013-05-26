<?php
function login($username, $password) {

    require_once '../dal/UserDAL.php';

    $userDAL = new UserDAL();
    $login_success = $userDAL->user_login($username, $password);

    if ($login_success) {
        if (!isset($_SESSION)) { session_start(); }
        $_SESSION['user'] = $username;
        header('Location: admin.php');
        echo '1';
    } else {
         echo "<script>alert('Error de Usuario/Contraseña');</script>";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    login($_POST['username'], $_POST['password']);
    
} else {
    if (!isset($_SESSION)) { session_start(); }
    if (isset($_SESSION['user'])) {
        header('Location: admin.php');
    }
}
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
                            <input id="username" name="username" type="text" autocomplete="on" required="true"/>
                        </div>
                        <div id="login-password">
                            <label class="labels" for="password">Contraseña:</label> <br/>
                            <input id="password" name="password" type="password" required="true"/>
                        </div>
                        <div id="login-submit-div">
                            <input class="labels" id="login-sumit" name="login" type="submit" value="Ingresar"/>
                        </div>

                        <div id="error-div">
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