<?php 
    if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }
    
    $pageGet = $_GET['page'];
    $page = null;
    
    switch ($pageGet){
        case 'users':
            $page = 'users.php';
        break;
        case 'contestants':
            $page = 'contestants.php';
        break;
        case 'games':
            $page = 'games.php';
        break;
        case 'consoles':
            $page = 'consoles.php';
        break;
        case 'survey':
            $page = 'survey.php';
        break;
        default :
            $page = 'admin-intro.php';
        break;
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administrar Gamers Paradise</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
    </head>

    <body>
        <div id="wrapper">
            <div id="title">
                <h1 class="titles">GAMERS PARADISE</h1>
            </div>
            <div id="content">
                
                <div id="nav">
                    <ul id="menu">
                        <li><a href="admin.php?page=users">Usuarios</a></li>
                        <li><a href="admin.php?page=contestants">Concursantes</a></li>
                        <li><a href="admin.php?page=games">Juegos</a></li>
                        <li><a href="admin.php?page=consoles">Consolas</a></li>
                        <li><a href="admin.php?page=survey">Cuestionario</a></li>
                        <li><a href="logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
                <div id="main">
                    <object type="text/html" data="<?php echo $page;?>" width="558px" height="555px"></object>
                    
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
