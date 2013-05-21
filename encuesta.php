<?php 
require_once('dal/QuestionDAL.php');

$quuestionDAL = new QuestionDAL();
$questions = $quuestionDAL->getQuestions();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="titulo">
    <h1 class="titles">GAMERS PARADISE</h1>
  </div>
  <div id="survey">
  <form id="survey">
  <?php foreach ($questions as $question){?>
  	<div class="question">
    
    	<p><?php echo $question->getText(); ?></p>
        <div id="choices">
        <?php foreach ($question->getChoices() as $choice){?>
        
        	<input type="checkbox" value="<?php $choice->getChoice_id();?>" name="<?php $question->getQuestion_id();?>" /> <?php $choice->getText(); ?> <br/>
        
        <?php }?>
        </div>
    
    </div>
  <?php }?>
  </form>
  </div>
  <div id="sidebar">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>