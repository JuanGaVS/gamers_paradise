var choices = [];

function isSurveyFill( ){
	var selectedCheckbox = 0;
	
	for( var index = 0; index < choices.length; index++ ){
		if( choices[index].idQuestion == 1 ){
			selectedCheckbox = selectedCheckbox + 1;
		}//Fin de if
	}//Fin de for.
	
	if( choices.length == ( 10 + selectedCheckbox ) && choices.length >= 11 ){
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

function mayor( ) {
 alert( "Entro mayor" );
  request = $.ajax({
  type: "POST",
  url: "calls.php",
  data: { 
 	method:'mayor',
  numero1:1
  },
  success: function(data){
  var response = data;
  //alert( 'respuesta: ' + data );
  $( 'span.mayor' ).html( response.toString( ) );
  }//Fin de sucess.
  })//Fin de request. 
 .fail( function( jqxhr, msg ){
 	alert( "Entro fail: " + msg );
 } )//Fin de fail.
}//Fin de function mayor.

function sendSurvey( ){
	alert( "Entro SendSurvey" );
	request = $.ajax({
        type: "POST",
        url: "sugerencias.php",
        data: { method: 'sendSurvey', 
            answers: 'choices'
        }//Fin de data.
        ,
        success: function( data ){
            var response = data;
            //alert( 'respuesta: ' + data );
            $( 'span.mayor' ).html( response.toString( ) );
        }//Fin de sucess.
    })//Fin de request. 
	.fail( function( jqxhr, msg ){
		alert( "Entro fail: " + msg );
	} )//Fin de fail.
}//Fin de function sendSurvey.

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
		$( '.buttonSend' ).show( );
	}//Fin de if.
	else{
		$( '.buttonSend' ).hide( );
	}//Fin d else.
});

$( '.buttonSend' ).on( 'click', function( ){
	alert( "Antes Send Survey" );
	sendSurvey( );
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
});

//DOM is ready
$(document).ready(function() {
	//alert( "READY" );
});