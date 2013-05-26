<?php require_once('../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_rs_games = "-1";
if (isset($_GET['game_id'])) {
  $colname_rs_games = $_GET['game_id'];
}
mysql_select_db($database_localhost, $localhost);
$query_rs_games = sprintf("SELECT game_id, name, trailer_url, `description` FROM tb_game WHERE game_id = %s", GetSQLValueString($colname_rs_games, "int"));
$rs_games = mysql_query($query_rs_games, $localhost) or die(mysql_error());
$row_rs_games = mysql_fetch_assoc($rs_games);
$totalRows_rs_games = mysql_num_rows($rs_games);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <th scope="row">ID</th>
    <td><?php echo $row_rs_games['game_id']; ?></td>
  </tr>
  <tr>
    <th scope="row">Nombre</th>
    <td><?php echo $row_rs_games['name']; ?></td>
  </tr>
  <tr>
    <th scope="row">Descripción</th>
    <td><?php echo $row_rs_games['description']; ?></td>
  </tr>
  <tr>
    <th scope="row">Tráiler</th>
    <td><iframe type="text/html" width="550px" height="400px" src="<?php echo $row_rs_games['trailer_url']; ?>" frameborder="0"></iframe></td>
  </tr>
</table>
<h3><a href="games.php">Listado de Juegos </a></h3>
</body>
</html>
<?php
mysql_free_result($rs_games);
?>
