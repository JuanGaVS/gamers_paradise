var choices = [];

function isSurveyFill( ){
	if( choices.length >= 11 ){
		return true;
	}//Fin de if.
	return false;
}//Fin de is isSurveyFill.

function addChoices( choice ){
	choices.push( choice );
}//Fin de function addChoices.

function scanChoices( choice ){
	//alert( "Entro a scan" );
	var finded = -1;
	for( var index = 0; index < choices.length; index++ ){
		//alert( "Entro al for" );
		if( choices[index].idQuestion == choice.idQuestion ){
			if( choices[index].idQuestion == 1 ){
				if( choices[index].idSelectedChoise == choice.idSelectedChoise ){
					finded = index;
				}//Fin de if.
			}//Fin de if.
			else{
				finded = index;
			}//Fin de else.
		}//Fin de if.
	}//Fin de for.
	//alert( "Valor de finded = " + finded );
	//alert( "brinco el for" );
	return finded;
}//Fin de function scanChoices.

function changeQuestions( ){
	request = $.ajax({
        type: "POST",
        url: "calls.php",
        data: { 
			method: 'changeQuestions', 
			/*
            name:document.getElementById( 'name' ).value,
            pin:document.getElementById( 'pin' ).value,
            phone:document.getElementById( 'phone' ).value,
            email:document.getElementById( 'email' ).value
		*/
        }//Fin de data.
        ,
        success: function( data ){
            var response = data;
            //alert( 'respuesta: ' + data );
            $( 'span.resultado' ).html( response.toString( ) );
        }//Fin de sucess.
    })//Fin de request. 
}//Fin de function changeQuestions

$( '.choice' ).on( 'click', function( ){
	//alert( "Id_Question" + $( this ).attr( 'name' ) + ":: IdChoise" + $( this ).val( ) );
	var inputChoice = { idQuestion: $( this ).attr( 'name' ), idSelectedChoise: $( this ).val( ) };
	var isInArray = scanChoices( inputChoice );
	if( isInArray != -1 ){
		if( inputChoice.idQuestion == 1 ){
			//alert( "Era el checkbox y se esta desmarcando asi q elimino" );
			choices.splice( isInArray, 1 );
		}//Fin de if.
		else{
			//alert( "Ya existia en el arreglo, se reemplaza" );
			choices[ isInArray ] = inputChoice;
		}//Fin de else.
	}//Fin de if.
	else{
		//alert( "No existia en el arreglo, se procede a guardar" );
		addChoices( inputChoice );
	}
	if( isSurveyFill( ) ){
		//alert( "La encuesta esta completa" );
		$( '.buttonSent' ).show( );
	}//Fin de if.
	else{
		$( '.buttonSent' ).hide( );
	}//Fin d else.
});

$( '.buttonSent' ).on( 'click', function( ){
	//alert( "Deberia de enviar" );
});

$( '.buttonNext' ).on( 'click', function( ){
	//alert( $('.question').css("display") );
	if( $('.question').css("display") != 'none' ){
		$( '.question' ).hide( );
		$( '.question2' ).show( );
		$( this ).val( 'Atras' );
	}
	else{
		$( '.question2' ).hide( );
		$( '.question' ).show( );
		$( this ).val( 'Siguiente' );
	}//Fin de else.
	/*$( this ).addClass( 'buttonBack' );
	$( this ).removeClass( 'buttonNext' );
	$( this ).off( 'click' );*/
    changeQuestions( );
});

/*$( '.buttonBack' ).on( 'click', function( ){
	alert( "'.buttonBack'" );
	$( '.question2' ).hide( );
	$( '.question' ).show( );
	$( this ).val( 'Siguiente' );
	$( this ).addClass( 'buttonNext' );
	$( this ).removeClass( 'buttonBack' );
    changeQuestions( );
});*/

//DOM is ready
$(document).ready(function() {
	//alert( "READY" );
});