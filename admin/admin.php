<?php 
    if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }
    
    $pageGet = $_GET['page'];
    $page = null;
    
    switch ($pageGet){
        case 'usuarios':
            $page = 'usuarios.php';
        break;
        case 'concursantes':
            $page = 'concursantes.php';
        break;
        case 'juegos':
            $page = 'juegos.php';
        break;
        case 'consolas':
            $page = 'consolas.php';
        break;
        case 'cuestionario':
            $page = 'cuestionario.php';
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
                        <li><a href="admin.php?page=usuarios">Usuarios</a></li>
                        <li><a href="admin.php?page=concursantes">Concursantes</a></li>
                        <li><a href="admin.php?page=juegos">Juegos</a></li>
                        <li><a href="admin.php?page=consolas">Consolas</a></li>
                        <li><a href="admin.php?page=cuestionario">Cuestionario</a></li>
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
