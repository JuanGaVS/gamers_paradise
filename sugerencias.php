<?php
require_once('dal/ChoiceDAL.php');
require_once('dal/GameDAL.php');
require_once('entities/GameValue.php');

$choiceDAL = new ChoiceDAL( );
$gameDAL = new GameDAL( );

$respuestas = $_POST['answers'];

$gamesIDFromDB = $gameDAL->getGamesID();

$size = sizeof( $gamesIDFromDB );

$gamesValues = array( );

for ($index = 0; $index < $size; $index++) {
    $gameValue = new GameValue( );
    $gameValue->setGame_id( $gamesIDFromDB[$index] );
    $gamesValues[ ] = $gameValue;
}//Fin de for.

$datos = json_decode( $respuestas, true );

foreach ($datos["choices"] as $choice) {
    $idQuestion = $choice[ "idQuestion" ];
    $idSelectedChoise = $choice[ "idSelectedChoise" ];
    $games = $choiceDAL->getGamesFromChoice( $idSelectedChoise );

    foreach ($games as $game) {
        $maxSize = sizeof($gamesValues);
        for ($index = 0; $index < $maxSize; $index++) {
            $gameValue = $gamesValues[$index];
            if ($gameValue->getGame_id() == $game->getGame_id( ) ) {
                $gameValue->addPoint();
                break;
            }//Fin de if.
        }//Fin de for.
    }//Fin de foreach.
}//Fin de foreach.

//print_r( $gamesValues );
//print_r( "____________________________________________________________________________________________________" );

//orderArray($gamesValues);

$maxSize = sizeof($gamesValues);
    $gameValueJoker = new GameValue( );
    for ($index = 0; $index < $maxSize; $index++) {
        for ($index2 = 1; $index2 < $maxSize; $index2++) {
            if ($gamesValues[$index]->getPoints() < $gamesValues[$index2]->getPoints()) {
                $gameValueJoker = $gamesValues[$index2];
                $gamesValues[$index2] = $gamesValues[$index];
                $gamesValues[$index] = $gameValueJoker;
            }//Fin de if.
        }//Fin de for.
    }//Fin de for.


//________________________________________

//print_r( $gamesValues );

$topGames = array( );

for ($index = 0; $index < 5; $index++) {
	$topGames[] = $gamesValues[$index];
}//Fin de for.

$showGames = array();

foreach ($topGames as $topGame) {
	$id = $topGame->getGame_id( );
	$game = $gameDAL->getGame( $id );
	$showGames[] = $game;
}//Fin de foreach.

function orderArray($array) {
    $maxSize = sizeof($array);
    $gameValueJoker = new GameValue( );
    for ($index = 0; $index < $maxSize; $index++) {
        for ($index2 = 1; $index2 < $maxSize; $index2++) {
            if ($array[$index]->getPoints() < $array[$index2]->getPoints()) {
                $gameValueJoker = $array[$index2];
                $array[$index2] = $array[$index];
                $array[$index] = $gameValueJoker;
            }//Fin de if.
        }//Fin de for.
    }//Fin de for.
}//Fin de orderArray.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sugerencias</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/main.js" ></script>
        
    </head>

    <body>
        <script>
            
        </script>
        <script src="js/facebook.js" type="text/javascript"></script> 
        <div id="wrapper">
            <div id="titulo" class="titulo-sugerencias">
                <h1 class="titles">SUGERENCIAS PARA VOS</h1>
                <h2 class="titles-18">HAZ CLICK EN UN JUEGO PARA VER UN REVIEW</h2>
            </div>
            <div id="sugerencias">

                <?php foreach ($showGames as $showGame) { ?>

                    <div class="sugerencia">

                        <img src="<?php echo $showGame->getFirstPicture(); ?>" alt="Imagen" width="185px" height="110px"/>
                        <input type="radio" name="games" onchange="reloadConsoles();" value="<?php echo $showGame->getGame_id(); ?>" id="<?php echo $showGame->getGame_id(); ?>"/>
                        <label for="<?php echo $showGame->getGame_id(); ?>" class="paragraphs" style="text-transform:uppercase">
                            <a class="fancybox iframe" rel="group" href="juego.php?game_id=<?php echo $showGame->getGame_id(); ?>"><?php echo $showGame->getName(); ?></a>
                        </label>

                    </div>

                <?php }
                
                $game0 = $showGames[0]->getGame_id();
                
                //echo ("<script>document.getElementById('#$game0').onchange();</script>");
                
                echo ("<script>$('#$game0').attr('checked','checked');</script>");
                echo ("<script>$('#$game0').change();</script>");
                
                 ?>

                

                <div  id="choose-console" class="styled" on>

                    <select id="consoles-select" name="console">
                    </select>
                </div>

                
                <a  id="contenedor-boton" onclick="postAndChoose();return false;" href="#">ESCOGER</a>


                <p  class="paragraphs-15" id="share-obligation">DEBES COMPARTIR LA PUBLICACIÓN PARA PARTICIPAR</p>

            </div>
            <div id="sidebar">
                <object type="text/html" data="sidebar.php" width="235px" height="660px"></object>
            </div>

            <div id="footer">
                <h2 id="footer-title"><a class="fancybox iframe" rel="group" href="privacy.html">PRIVACIDAD</a> | <a class="fancybox iframe" rel="group" href="tos.html">REGLAS</a></h2>
                <p class="information">Al utilizar esta aplicación aceptas las reglas de la misma. Recuerda que no hay un premio real.</p>
            </div>

        </div>

        </div>
    </body>
    
    <script src="js/jquery.cycle.all.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.4"></script>
    <script src="js/fancybox.js" type="text/javascript"></script>
    <script src="js/sidebar.js" type="text/javascript"></script>
    
    <!--script src="js/main2.js" type="text/javascript"></script-->
</html>