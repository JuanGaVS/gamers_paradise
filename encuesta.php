<?php 
require_once('dal/QuestionDAL.php');

$quuestionDAL = new QuestionDAL();
$questions = $quuestionDAL->getQuestions();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Survey</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
</head>

<body>
<script src="js/facebook.js" type="text/javascript"></script> 
<div id="wrapper">
  <div id="titulo">
    <h1 class="titles">GAMERS PARADISE</h1>
  </div>
  <div id="survey">
  <form id="survey" method="post" action="sugerencias.php">
  <?php 
  $number = 1;
  $questions_choices_array = array();
  foreach ($questions as $question){?>
  	<div class= "question<?php if( $number > 5 ){ echo "2"; }  ?>">
    	<?php echo $number . ")" .  $question->getText(); ?>
        <br/>
        <div id="choices">
        <?php $choices = $question->getChoices( );
		$maxIndex = sizeof( $choices );
        for( $index = 0; $index < $maxIndex; $index++ ){ 
        	$choice = $choices[$index];
        	if( $question->getType_multiple( ) == 1 ){ ?>
        	<input class="choice" type="checkbox" value="<?php echo( $choice->getChoice_id() );?>"  id="<?php echo $choice->getChoice_id();?>" name="<?php echo $question->getQuestion_id();?>"/> 
            <label for="<?php echo $choice->getChoice_id();?>">
			<?php echo $choice->getText(); ?>
            </label>
            <?php if( ( fmod( $maxIndex , 2 ) == 0 && $index == $maxIndex/2 - 1 ) || ( fmod( $maxIndex , 2 ) != 0 && $index == 1 ) ){ echo '<br/>'; }  ?>
        	<?php }/*Fin de if multiple.*/
			else{?>
            <input class="choice" type="radio" id="<?php echo( $choice->getChoice_id() );?>_"  name="<?php echo( $question->getQuestion_id( ) );?>" value="<?php echo( $choice->getChoice_id() );?>" required="required">
            <label for="<?php echo( $choice->getChoice_id() );?>_">
            	<?php echo $choice->getText(); ?>
            </label>
                <?php if( ( fmod( $maxIndex , 2 ) == 0 && $index == $maxIndex/2 - 1 && $maxIndex > 2 ) || ( fmod( $maxIndex , 2 ) != 0 && $index == 1 ) ){ echo '<br/>'; }  ?>
        	</input>
            <?php }//Fin de else. ?>
        <?php }//Fin de foreach choices. ?>
        </div>
    </div>
  <?php $number += 1; }//Fin de foreach question. ?>
  <input type="button" class="buttonNext contenedor-boton-encuesta" name="button" value="Siguiente"/>
  <input type="submit" class="buttonSend contenedor-boton-encuesta contenedor-boton-encuesta-enviar" name="button2" value="Enviar" />
  </form>
  </div>
  <div id="sidebar">
    <object type="text/html" data="sidebar.php" width="329px" height="660px"></object>
  </div>
  
  <div id="footer">
                <h2 id="footer-title"><a class="fancybox iframe" rel="group" href="privacy.html">PRIVACIDAD</a> | <a class="fancybox iframe" rel="group" href="tos.html">REGLAS</a></h2>
                <p class="information">Al utilizar esta aplicación aceptas las reglas de la misma. Recuerda que no hay un premio real.</p>
        </div>
        
    </div>
  
</div>
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.cycle.all.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.4"></script>
	<script src="js/fancybox.js" type="text/javascript"></script>
	<script src="js/sidebar.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/main.js" ></script>
</body>
	
</html>