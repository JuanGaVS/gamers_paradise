<?php
require_once 'dal/GameDAL.php';

$gDAL = new GameDAL();

$games = $gDAL->getGames();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/sidebar.css" rel="stylesheet" type="text/css" />
    </head>
    <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />

    <body>
        <div id="sidebar" class="sidebar">
           
            <div id="slideshow">
            
            <a href="http://www.rockstargames.com/" target="_blank">
                <div class="banner" id="banner-section1">

                </div>
            </a>
            
            <div class="games-sidebar" id="games-section1">

                <h1 id="title-sidebar">
                    MÁS POPULARES
                </h1>

<?php
for ($actualIndex = 0; $actualIndex < 3; $actualIndex++) {
    ?>
    <a href="juego.php?game_id=<?php echo $games[$actualIndex]->getGame_id(); ?>" target="_blank">
    
                    <div class="game-sidebar">


                        <div class="game-picture">
                            <img src="<?php echo $games[$actualIndex]->getFirstPicture(); ?>" height="110px" width="145px" alt="Imagen Juego"/>
                        </div>
                        <div class="game-title"><?php echo $games[$actualIndex]->getName(); ?></div>
                    </div>
</a>
<?php } ?>     


            </div>
            
            <a href="http://www.rockstargames.com/" target="_blank">
                <div class="banner" id="banner-section2">

                </div>
            </a>
            
            
            <div class="games-sidebar" id="games-section2">

                <h1 id="title-sidebar">
                    MÁS POPULARES
                </h1>

<?php
for ($actualIndex = 3; $actualIndex < 6; $actualIndex++) {
    ?>
    <a href="juego.php?game_id=<?php echo $games[$actualIndex]->getGame_id(); ?>" target="_blank">
                    <div class="game-sidebar">

                        <div class="game-picture">
                            <img src="<?php echo $games[$actualIndex]->getFirstPicture(); ?>" height="110px" width="145px" alt="Imagen Juego"/>
                        </div>
                        <div class="game-title"><?php echo $games[$actualIndex]->getName(); ?></div>
                    </div>
                    </a>

<?php } ?>     




            </div>
            
            <a href="http://www.rockstargames.com/" target="_blank">
                <div class="banner" id="banner-section3">

                </div>
            </a>
            


            

            

            <div class="games-sidebar" id="games-section3">

                <h1 id="title-sidebar">
                    MÁS POPULARES
                </h1>

<?php
for ($actualIndex = 6; $actualIndex < 9; $actualIndex++) {
    ?>
    <a href="juego.php?game_id=<?php echo $games[$actualIndex]->getGame_id(); ?>" target="_blank">
                    <div class="game-sidebar">

                        <div class="game-picture">
                            <img src="<?php echo $games[$actualIndex]->getFirstPicture(); ?>" height="110px" width="145px" alt="Imagen Juego"/>
                        </div>
                        <div class="game-title"><?php echo $games[$actualIndex]->getName(); ?></div>
                    </div>
                    </a>

<?php } ?>     




            </div>

        </div>

<div id="sidebar-bottom">
                <div id="sidebar-prevnext">
                    <div id="prev"></div>
                    <div id="next"></div>
                </div>
            </div>


        </div>

        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.cycle.all.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.4"></script>
<script src="js/fancybox.js" type="text/javascript"></script>
        <script src="js/sidebar.js" type="text/javascript"></script>

    </body>
</html>