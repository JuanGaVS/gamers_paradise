<?php 
if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <div id="admin-games">
            <div id="table">
                <table id="games">
                    <thead>
                        <th class="table-title" id="game-name">Nombre</th>
                        <th class="table-title" id="game-trailer">Tráiler</th>
                        <th class="table-title" id="game-pictures">Imágenes</th>
                        <th class="table-title" id="game-pictures">Acciones</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th width="100px"><h2 class="paragraphs"><a href="#">Halo 4</a></h2></th>
                            <th>
                                <iframe type="text/html" width="250px" height="100px" src="http://www.youtube.com/embed/ZRxj8wEssqc" frameborder="0"></iframe>
                            </th>
                            <th>
                                <table width="200px">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <img src="http://oxm.com.mx/wp-content/uploads/2012/06/halo-4.jpg" width="100px" height="50px"></img>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <img src="http://oxm.com.mx/wp-content/uploads/2012/06/halo-4.jpg" width="100px" height="50px"></img>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <img src="http://oxm.com.mx/wp-content/uploads/2012/06/halo-4.jpg" width="100px" height="50px"></img>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </th>
                            <th>
                                <a href="#">Editar</a>
                                <a href="#">Eliminar</a>
                            </th>
                        </tr>
                        <tr>
                            <th width="100px"><h2 class="paragraphs"><a href="#">Halo 4</a></h2></th>
                            <th>
                                <iframe type="text/html" width="250px" height="100px" src="http://www.youtube.com/embed/ZRxj8wEssqc" frameborder="0"></iframe>
                            </th>
                            <th>
                                <table width="200px">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <img src="http://oxm.com.mx/wp-content/uploads/2012/06/halo-4.jpg" width="100px" height="50px"></img>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <img src="http://oxm.com.mx/wp-content/uploads/2012/06/halo-4.jpg" width="100px" height="50px"></img>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <img src="http://oxm.com.mx/wp-content/uploads/2012/06/halo-4.jpg" width="100px" height="50px"></img>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </th>
                            <th>
                                <a href="#">Editar</a>
                                <a href="#">Eliminar</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <p>
          <?php
        
        // put your code here
        ?>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>
</html>
