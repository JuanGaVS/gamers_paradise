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
    
    <a id="contenedor-boton" href="<?php echo $loginUrl; ?>">INICIAR</a>
    
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