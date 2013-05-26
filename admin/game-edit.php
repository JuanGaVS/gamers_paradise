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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tb_game SET name=%s, trailer_url=%s, `description`=%s WHERE game_id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['trailer_url'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString($_POST['game_id'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());

  $updateGoTo = "games.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_rs_games = "SELECT game_id, name, trailer_url, `description` FROM tb_game";
$rs_games = mysql_query($query_rs_games, $localhost) or die(mysql_error());
$row_rs_games = mysql_fetch_assoc($rs_games);
$totalRows_rs_games = mysql_num_rows($rs_games);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Juego</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="200" border="1">
    <tr>
      <th scope="row">Nombre</th>
      <td><label>
        <input name="name" type="text" id="name" value="<?php echo $row_rs_games['name']; ?>" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Trailer URL</th>
      <td><label>
        <input name="trailer_url" type="text" id="trailer_url" value="<?php echo $row_rs_games['trailer_url']; ?>" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Descripción</th>
      <td><label>
        <textarea name="description" id="description"><?php echo $row_rs_games['description']; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <th scope="row"><input type="button" name="btn_cancelar" id="btn_cancelar" value="Cancelar" onclick="window.location.href = 'users.php';" /></th>
      <td><input type="submit" name="btn_save" id="btn_save" value="Guardar" /></td>
    </tr>
  </table>
  <input name="game_id" type="hidden" id="game_id" value="<?php echo $row_rs_games['game_id']; ?>" />
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($rs_games);
?>
