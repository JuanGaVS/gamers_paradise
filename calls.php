<?php
	
	switch( $_POST[ 'method' ] ){
		case 'mayor':
            mayor( $_POST[ 'numero1' ] );
    	break;
		case 'sendSurvey':
<<<<<<< HEAD
			$respuestas = $_POST[ 'answers' ];
			sendSurvey( );
=======
			$respuestas = $_POST('answers');
			//sendSurvey( );
>>>>>>> 22d3b85a475eb73d304d909bb947d0ec26dad4a3
		break;
    }//Fin de switch.
	
	function mayor( $numero1 ){
        echo $numero1;
    }//Fin de function mayor.
	
	function sendSurvey( ){
       echo "ENTRO";
    }//Fin de function mayor.
?>