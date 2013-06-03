<?php
	switch( $_POST[ 'method' ] ){
		case 'sendSurvey':
			//$respuestas = $_POST( 'answers' );
			sendSurvey( );
	}//Fin de switch.
	
	function sendSurvey( ){
       echo "ENTRO";
    }//Fin de function mayor.
?>