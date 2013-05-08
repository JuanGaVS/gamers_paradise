<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Iniciar Sesión</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<div id="wrapper">
  <div id="title">
    <h1 class="titles">GAMERS PARADISE</h1>
  </div>
  <div id="content">
  	<div id="login">
    	<form id="login" method="post" action="#">
        	<div id="login-username">
            	<label class="labels" for="username">Nombre de Usuario:</label> <br/>
            	<input id="username" name="username" type="text" autocomplete="off"/>
            </div>
        	<div id="login-password">
            	<label class="labels" for="password">Contraseña:</label> <br/>
            	<input id="password" name="password" type="password"/>
            </div>
            <div id="login-submit">
            	<input class="labels" id="login-submit" name="login" type="submit" value="Ingresar"/>
            </div>
            
            <div id="error">
            	<span class="error"></span>
            </div>
            
        </form>
        
    </div>
  </div>
  <div id="footer">
  	<h2 id="footer-title"><a href="#">PRIVACIDAD</a> | <a href="#">REGLAS</a></h2>
    <p class="information">Lorem ipsum dolor sit anet blablalba</p>
  </div>
</div>
</body>
</html>