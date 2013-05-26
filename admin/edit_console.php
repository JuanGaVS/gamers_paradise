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
  $updateSQL = sprintf("UPDATE tb_console SET name=%s WHERE console_id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['console_id'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());

  $updateGoTo = "consoles.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rs_editConsole = "-1";
if (isset($_GET['console_id'])) {
  $colname_rs_editConsole = $_GET['console_id'];
}
mysql_select_db($database_localhost, $localhost);
$query_rs_editConsole = sprintf("SELECT console_id, name FROM tb_console WHERE console_id = %s", GetSQLValueString($colname_rs_editConsole, "int"));
$rs_editConsole = mysql_query($query_rs_editConsole, $localhost) or die(mysql_error());
$row_rs_editConsole = mysql_fetch_assoc($rs_editConsole);
$totalRows_rs_editConsole = mysql_num_rows($rs_editConsole);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar Consola</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="200" border="1">
    <tr>
      <th scope="row">Nombre</th>
      <td><label for="name"></label>
        <input value="<?php echo $row_rs_editConsole['name']; ?>" type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <th scope="row"><input type="submit" name="btn_edit" id="btn_edit" value="Editar" /></th>
      <td><input type="button" name="btn_cancel" id="btn_cancel" value="Cancelar" onclick="window.location.href = 'consoles.php';" />
      <input name="console_id" type="hidden" id="console_id" value="<?php echo $row_rs_editConsole['console_id']; ?>" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($rs_editConsole);
?>
