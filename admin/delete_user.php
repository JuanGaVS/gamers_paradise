<?php 
if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}
require_once('../Connections/localhost.php');

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

if ((isset($_POST['username'])) && ($_POST['username'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tb_users WHERE username=%s",
                       GetSQLValueString($_POST['username'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($deleteSQL, $localhost) or die(mysql_error());

  $deleteGoTo = "users.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_rs_deleteUser = "-1";
if (isset($_GET['username'])) {
  $colname_rs_deleteUser = $_GET['username'];
}
mysql_select_db($database_localhost, $localhost);
$query_rs_deleteUser = sprintf("SELECT username, first_name, last_name, email FROM tb_users WHERE username = %s", GetSQLValueString($colname_rs_deleteUser, "text"));
$rs_deleteUser = mysql_query($query_rs_deleteUser, $localhost) or die(mysql_error());
$row_rs_deleteUser = mysql_fetch_assoc($rs_deleteUser);
$totalRows_rs_deleteUser = mysql_num_rows($rs_deleteUser);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>¿Está seguro que desea eliminar el usuario <?php echo strtolower($row_rs_deleteUser['username']); ?> ?
    <input name="username" type="hidden" id="username" value="<?php echo $row_rs_deleteUser['username']; ?>" />
  </p>
  <p>
    <input type="submit" name="btn_delete" id="btn_delete" value="Confirmar" />
    <input type="button" name="btn_cancel" id="btn_cancel" value="Cancelar" onclick="window.location.href = 'users.php';" />
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs_deleteUser);
?>
