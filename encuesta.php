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
</head>

<body>
<div id="wrapper">
  <div id="titulo">
    <h1 class="titles">GAMERS PARADISE</h1>
  </div>
  <div id="survey">
  <form id="survey">
  <?php 
  $number = 1;
  foreach ($questions as $question){?>
  	<div class="question">
    	<p><?php echo $number . ")" .  $question->getText(); ?></p>
        <div id="choices">
        <?php foreach ($question->getChoices() as $choice){?>
        	<?php if( $question->getType_multiple( ) == 1 ){ ?>
        	<input type="checkbox" value="<?php echo( $choice->getChoice_id() );?>"  id="<?php echo $choice->getChoice_id();?>" name="<?php echo $question->getQuestion_id();?>"/> <?php echo $choice->getText(); ?>
            <br/>
        	<?php }/*Fin de if multiple.*/
			else{?>
            <input type="radio"  name="<?php echo( $question->getQuestion_id( ) );?>" value="<?php echo( $choice->getChoice_id() );?>">
        		<?php echo $choice->getText(); ?>
        	</input>
            <?php }//Fin de else. ?>
        <?php }//Fin de foreach choices. ?>
        </div>
    </div>
    <br/>
  <?php $number += 1; }//Fin de foreach question. ?>
  <button>Siguiente</button>
  </form>
  </div>
  <div id="sidebar">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>