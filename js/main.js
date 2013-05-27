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

$( '.buttonNext' ).on( 'click', function( ){
	alert( "'.buttonNext'" );
	$( '.question' ).hide( );
	$( '.question2' ).show( );
	$( this ).val( 'Atras' );
	$( this ).addClass( 'buttonBack' );
	$( this ).removeClass( 'buttonNext' );
    changeQuestions( );
});

$( '.buttonBack' ).on( 'click', function( ){
	alert( "'.buttonBack'" );
	$( '.question2' ).hide( );
	$( '.question' ).show( );
	$( this ).val( 'Siguiente' );
	$( this ).addClass( 'buttonNext' );
	$( this ).removeClass( 'buttonBack' );
    changeQuestions( );
});

//DOM is ready
$(document).ready(function() {
	//alert( "READY" );
});