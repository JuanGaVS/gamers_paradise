<?php
	switch( $_POST[ 'method' ] ){
		case 'mayor':
            mayor( $_POST[ 'numero1' ] );
        break;
		case 'sendSurvey':
			//$respuestas = $_POST( 'answers' );
			sendSurvey( );
		break;
    }//Fin de switch.
	
	function mayor( $numero1 ){
        echo $numero1;
    }//Fin de function mayor.
	
	function sendSurvey( ){
       echo "ENTRO";
    }//Fin de function mayor.
?>