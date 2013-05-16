<?php 
if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}
?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <div id="instrucciones">
            <p class="paragraphs">Haga Clic en una de las opciones de la izquierda para administrar la aplicación</p>
        </div>
        
        
    </body>
</html>
