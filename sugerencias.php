<?php
require_once('dal/ChoiceDAL.php');
require_once('dal/GameDAL.php');
require_once('entities/GameValue.php');

$choiceDAL = new ChoiceDAL();
$gameDAL = new GameDAL();

$respuestas = $_POST['answers'];

$gamesIDFromDB = $gameDAL->getGamesID();

$size = sizeof($gamesIDFromDB);

$gamesValues = array();

for ($index = 0; $index < $size; $index++) {
    $gameValue = new GameValue();
    $gameValue->setGame_id($gamesIDFromDB[$index]);

    $gamesValues[] = $gameValue;
}

$datos = json_decode($respuestas, true);

foreach ($datos["choices"] as $choice) {

    $idQuestion = $choice["idQuestion"];
    $idSelectedChoise = $choice["idSelectedChoise"];

    echo('question: ' . $idQuestion . '  idSelectedchoice ' . $idSelectedChoise . ' <br/>');

    $games = $choiceDAL->getGamesFromChoice($idSelectedChoise);

    foreach ($games as $game) {
        $maxSize = sizeof($gamesValues);
        for ($index = 0; $index < $maxSize; $index++) {
            $gameValue = $gamesValues[$index];
            
            if ($gameValue->getGame_id() == $game){
                $gameValue->addPoint();
                break;
            }

           
        }
    }
    
    
   
    
    
    
}

function orderArray($array){
	$maxSize = sizeof($array);
	$gameValueJoker = new GameValue( );
    for ($index = 0; $index < $maxSize; $index++) {
		for ($index2 = 0; $index2 < $maxSize; $index2++) {
			if( $array[$index]->getPoints( ) < $array[$index2]->getPoints( ) ){
				$gameValueJoker = $array[$index2];
				$array[$index2] = $array[$index];
				$array[$index] = $gameValueJoker;
			}//Fin de if.
		}//Fin de for.
	}//Fin de for.
}//Fin de function orderArray.

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sugerencias</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
    </head>

    <body>
        <script src="js/facebook.js" type="text/javascript"></script> 
        <div id="wrapper">
            <div id="titulo" class="titulo-sugerencias">
                <h1 class="titles">SUGERENCIAS PARA VOS</h1>
                <h2 class="titles-18">HAZ CLICK EN UN JUEGO PARA VER UN REVIEW</h2>
            </div>
            <div id="sugerencias">
                <span class='mayor' ><?php
if ($respuestas != null) {
    echo "CLARO AMO LA COMPAÑERA DE KEVIN";
} else {
    echo "MAME!!";
}
?></span>
                <div class="sugerencia">

                    <img src="#" alt="Imagen" width="185px" height="110px"/>
                    <input type="radio" name="games" value="j1" id="j1"/>
                    <label for="j1" class="paragraphs" style="text-transform:uppercase">
                        <a href="#">nombre</a>
                    </label>

                </div>

                <div class="sugerencia">

                    <img src="#" alt="Imagen" width="185px" height="110px"/>
                    <input type="radio" name="games" value="j1" id="j2"/>
                    <label for="j2" class="paragraphs" style="text-transform:uppercase">
                        <a href="#">nombre</a>
                    </label>

                </div>

                <div class="sugerencia">

                    <img src="#" alt="Imagen" width="185px" height="110px"/>
                    <input type="radio" name="games" value="j1" id="j3"/>
                    <label for="j3" class="paragraphs" style="text-transform:uppercase">
                        <a href="#">nombre</a>
                    </label>

                </div>

                <div class="sugerencia">

                    <img src="#" alt="Imagen" width="185px" height="110px"/>
                    <input type="radio" name="games" value="j1" id="j4"/>
                    <label for="j4" class="paragraphs" style="text-transform:uppercase">
                        <a href="#">nombre</a>
                    </label>

                </div>

                <div class="sugerencia">

                    <img src="#" alt="Imagen" width="185px" height="110px"/>
                    <input type="radio" name="games" value="j1" id="j5"/>
                    <label for="j5" class="paragraphs" style="text-transform:uppercase">
                        <a href="#">nombre</a>
                    </label>

                </div>

                <div id="choose-console" class="styled">

                    <select id="consoles-select" name="console">
                        <option value="1">Consola1</option>
                        <option value="2">Consola2</option>
                        <option value="3">Consola3</option>
                        <option value="4">Consola4</option>
                        <option value="5">Consola5</option>
                    </select>
                </div>

                <a id="contenedor-boton" href="#">ESCOGER</a>
                <p class="paragraphs-15" id="share-obligation">DEBES COMPARTIR LA PUBLICACIÓN PARA PARTICIPAR</p>

            </div>
            <div id="sidebar">
                <object type="text/html" data="sidebar.php" width="329px" height="660px"></object>
            </div>

            <div id="footer">
                <h2 id="footer-title"><a class="fancybox iframe" rel="group" href="privacy.html">PRIVACIDAD</a> | <a class="fancybox iframe" rel="group" href="tos.html">REGLAS</a></h2>
                <p class="information">Al utilizar esta aplicación aceptas las reglas de la misma. Recuerda que no hay un premio real.</p>
            </div>

        </div>

        </div>
    </body>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.cycle.all.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.4"></script>
    <script src="js/fancybox.js" type="text/javascript"></script>
    <script src="js/sidebar.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/main.js" ></script>
</html>