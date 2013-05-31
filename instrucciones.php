<?php
$loginUrl = ""; 
$permisos = 'id, first_name, middle_name, gender, last_name, locale, age_range, birthday';
//aquí agregamos o eliminamos los permisos.
require 'facebook.php';
$app_id = "556218747762833";
$app_secret = "eec279827ce7706afada43d769d1bcb3";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true,
'req_perms' => $permisos
));
  

$fbuser = $facebook->getUser();
if ($fbuser) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    //error_log($e);
    $fbuser = null;
  }
}
if ($fbuser) {
	$logoutUrl = $facebook->getLogoutUrl();
} else {
 	$loginUrl = $facebook->getLoginUrl(array('scope'=>$permisitos,'display'=>'popup'));
	//Este link es el que pedirá los permisos. Así el usuario aceptará o cancelará los permisos.
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Instrucciones</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/exitos.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />

</head>

<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '556218747762833', // App ID
    channelUrl : '//http://flashfusioner.com/gamers_paradise/channel.php', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

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
      testAPI();
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
</script>

<!--
  Below we include the Login Button social plugin. This button uses the JavaScript SDK to
  present a graphical Login button that triggers the FB.login() function when clicked.

  Learn more about options for the login button plugin:
  /docs/reference/plugins/login/ -->

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
<div id="wrapper">

	<div id="titulo">
    	<h1 class="titles">INSTRUCCIONES DE LA PROMOCIÓN</h1>
    </div>
    
	
  	<div id="instrucciones">
    	<p class="paragraphs-12">Esta aplicación es la oportunidad ideal para ganarte un juego en tu consola favorita de una forma sencilla.</p><br/>
        <p class="paragraphs-12">Cuando inicies se te presentará una serie de preguntas las cuales debes responder según tu criterio; no hay respusetas erradas. Cuando hayas llenado la encuesta, se te presentarán unos juegos previamente escogidos de acuerdo con tus respuestas.</p><br/>
        <p class="paragraphs-12">Para ingresar haz clic en el botón INICIAR</p><br/>
  </div>
  
  <div id="console-tv"></div>
  <div id="couch-friends"></div>
    
    <a id="contenedor-boton" onClick="FB.login();">INICIAR</a>
    
    <div id="footer">
                <h2 id="footer-title"><a class="fancybox iframe" rel="group" href="privacy.html">PRIVACIDAD</a> | <a class="fancybox iframe" rel="group" href="tos.html">REGLAS</a></h2>
                <p class="information">Al utilizar esta aplicación aceptas las reglas de la misma. Recuerda que no hay un premio real.</p>
    </div>
  </div>
</div>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.4"></script>
<script src="js/fancybox.js" type="text/javascript"></script>
</body>


</html>