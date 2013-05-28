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

mysql_select_db($database_localhost, $localhost);
$query_rs_Consoles = "SELECT console_id, name FROM tb_console";
$rs_Consoles = mysql_query($query_rs_Consoles, $localhost) or die(mysql_error());
$row_rs_Consoles = mysql_fetch_assoc($rs_Consoles);
$totalRows_rs_Consoles = mysql_num_rows($rs_Consoles);
 
if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}
?>

<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <p>CONSOLAS
  <?php
        // put your code here
        ?>
        </p>
    <p>&nbsp;</p>
    <table border="1">
      <tr>
        <td width="122">Nombre Consola</td>
        <td width="122">Acciones</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_rs_Consoles['name']; ?></td>
          <td><a href="edit_console.php?console_id=<?php echo $row_rs_Consoles['console_id']; ?>">Editar</a> | <a href="delete_console.php?console_id=<?php echo $row_rs_Consoles['console_id']; ?>">Eliminar </a></td>
        </tr>
        <?php } while ($row_rs_Consoles = mysql_fetch_assoc($rs_Consoles)); ?>
    </table>
    <p><a href="add_console.php">Agregar Consola</a></p>
    <p><a href="consoles-json.php">Borrar todo y cargar JSON</a></p>
    </body>
</html>
<?php
mysql_free_result($rs_Consoles);
?>
