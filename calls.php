<?php

switch ($_POST['method']) {
    case 'mayor':
        mayor($_POST['numero1']);
        break;
    case 'sendSurvey':

        $respuestas = $_POST['answers'];
        sendSurvey();

        $respuestas = $_POST('answers');
        //sendSurvey( );

        break;
    case 'saveUserGame':

       

        break;
}//Fin de switch.

function mayor($numero1) {
    echo $numero1;
}

//Fin de function mayor.

function sendSurvey() {
    echo "ENTRO";
}

//Fin de function mayor.

require_once('entities/GameUserDAL.php');

$gameUserDAL = new GameUserDAL();
	
	switch( $_POST[ 'method' ] ){
		case 'saveContestantGame':
            $gameUserDAL->saveContestantGame( $_POST[ 'uid' ],$_POST[ 'game' ],$_POST[ 'console' ] );
    	break;
		
    }//Fin de switch.
	
	
?>