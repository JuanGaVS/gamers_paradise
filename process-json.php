<?php 

$str_datos = file_get_contents("games.json");
$datos = json_decode($str_datos,true);
 
 foreach ($datos["games"] as $game){
	 
	 echo $game["id"];
	 echo "<br/>";
	 
}
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>