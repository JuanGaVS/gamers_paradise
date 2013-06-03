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


window.fbAsyncInit = function() {
  FB.init({
    appId      : '556218747762833', // App ID
    channelUrl : '//http://flashfusioner.com/gamers_paradise/channel.php', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

	FB.Canvas.setSize({height: 900});
	setTimeout("FB.Canvas.setAutoGrow()", 500);	

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
     // testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note tha t at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }

  function login(){

	FB.login(function(response) {
             if (response.authResponse) {
    			console.log('Welcome!  Fetching your information.... ');
   
				FB.api('/me?fields=id,first_name,last_name,locale,gender,birthday', function(response) {
			       //console.log('Good to see you, ' + response.name + '.');
				   var Vuid = response.id;
var			Vfirst_name = response.first_name;
	var		Vlast_name = response.last_name;
		var	Vlocale = response.locale;
			var Vgender= response.gender;
			var Vbirthday = response.birthday;
			request = $.ajax({
        
        type: "POST",
        url: "login.php",
        data: {
			uid:Vuid,
			first_name:Vfirst_name,
			last_name:Vlast_name,
			gender:Vgender,
			locale:Vlocale,
			birthday:Vbirthday,
            },
        success: function(data){
            var response = data;
            window.location="encuesta.php";
        }
        
        });
			
			     });
			 
		
	 
	 			//window.location = 'encuesta.php';
		   }
            }, {scope:'user_birthday,user_about_me,user_status'});
//redirect here
	}


function post(){
console.log('post');
    var status  =   "post de prueba";
    FB.api('/me/feed', 'post', { message: status }, function(response) {
        if (!response || response.error) {
            alert('Error occured');
        } else {
            alert('Status updated Successfully');
        }
    });
}

function post2(){
	
FB.ui(
  {
    method: 'feed',
    name: 'Facebook Dialogs',
    link: 'https://developers.facebook.com/docs/reference/dialogs/',
    picture: 'http://fbrell.com/f8.jpg',
    caption: 'Reference Documentation',
    description: 'Dialogs provide a simple, consistent interface for applications to interface with users.'
  },
  function(response) {
    if (response && response.post_id) {
      alert('Post was published.');
    } else {
      alert('Post was not published.');
    }
  }
);
}
//DOM is ready
$(document).ready(function() {
	//alert( "READY" );
});