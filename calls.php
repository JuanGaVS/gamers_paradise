<?php

require_once('entities/GameUserDAL.php');

$gameUserDAL = new GameUserDAL();
	
	switch( $_POST[ 'method' ] ){
		case 'saveContestantGame':
            $gameUserDAL->saveContestantGame( $_POST[ 'uid' ],$_POST[ 'game' ],$_POST[ 'console' ] );
    	break;
		
    }//Fin de switch.
	
	
?>