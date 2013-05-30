<?php 
$game_id = $_GET['game_id'];

require_once('dal/GameDAL.php');
require_once('entities/Game.php');



$gDAL = new GameDAL();



$game = $gDAL->getGame($game_id);

if($game->getName()!=null){
	

$pictures = $game->getPictures();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Juego</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link href="css/juego.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />


</head>

<body>
<div id="wrapper">

	<div id="titulo">
    	<h1 class="titles"><?php echo $game->getName();?></h1>
    </div>
    
	
  	<div id="video">
    <iframe type="text/html" width="100%" height="410px" src="<?php echo $game->getTrailer_url();?>" frameborder="0"></iframe>	
	</div>
  
  <div id="description">
  	<h1 class="titles">DESCRIPCIÓN</h1>
    <p><?php echo $game->getDescription();?></p>
  </div>
  <div id="game-pictures">
  <?php for($index=0; $index<3; $index++){?>
  	<div class="game-picture">
    	<a class="fancybox" rel="group" href="<?php echo $pictures[$index]; ?>"><img src="<?php echo $pictures[$index]; ?>" width="185px" height="110px"/></a>
    </div>
    <?php }?>
  </div>
    
    <div id="footer">
                <h2 id="footer-title"><a href="#">PRIVACIDAD</a> | <a href="#">REGLAS</a></h2>
                <p class="information">Lorem ipsum dolor sit anet blablalba</p>
    </div>
  </div>
</div>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.4"></script>
<script src="js/juego.js" type="text/javascript"></script>
</body>
</html>
<?php }?>