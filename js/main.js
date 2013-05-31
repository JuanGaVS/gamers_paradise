var choices = [];

function addChoices( choice ){
	choices.push( choice );
}

function scanChoices( choice ){
	alert( "Entro a scan" );
	var finded = -1;
	for( var index = 0; index < choices.length; index++ ){
		alert( "Entro al for" );
		if( choices[index].idQuestion == choice.idQuestion ){
			finded = index;
		}//Fin de if.
	}//Fin de for.
	alert( "brinco el for" );
	return index;
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
	//alert( $( this ).attr( 'name' ) + "___" + $( this ).val( ) );
	if( scanChoices( { idQuestion: $( this ).attr( 'name' ), idSelectedChoise: $( this ).val( ) } ) != -1 ){
		alert( "No existia en el arreglo" );
		alert( $( this ).attr( 'name' ) );
		addChoices( { idQuestion: $( this ).attr( name ), idSelectedChoise: $( this ).val( ) } );
	}//Fin de if.
	else{
		alert( "Ya existia en el arreglo" );
	}
});

$( '.buttonSent' ).on( 'click', function( ){
	alert( "Deberia de enviar" );
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