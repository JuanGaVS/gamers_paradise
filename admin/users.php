<?php require_once('../Connections/localhost.php');

if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}

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
$query_rs_users = "SELECT username, first_name, last_name, email FROM tb_users ORDER BY username ASC";
$rs_users = mysql_query($query_rs_users, $localhost) or die(mysql_error());
$row_rs_users = mysql_fetch_assoc($rs_users);
$totalRows_rs_users = mysql_num_rows($rs_users);
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
    <p>USUARIOS
      <?php
        // put your code here
        
        ?>
    </p>
    <table width="338" border="1">
      <tr>
        <td width="47">Usuario</td>
        <td width="51" align="center">Nombre</td>
        <td width="57" align="center">Apellidos</td>
        <td width="33" align="center">Email</td>
        <td width="116" align="center">Acción</td>
      </tr>
      <?php do { ?>
      <tr>
        <td height="26"><?php echo $row_rs_users['username']; ?></td>
        <td><?php echo $row_rs_users['first_name']; ?></td>
        <td><?php echo $row_rs_users['last_name']; ?></td>
        <td><?php echo $row_rs_users['email']; ?></td>
        <td align="center"><a href="edit_user.php?username=<?php echo $row_rs_users['username']; ?>">Editar</a> | <a href="delete_user.php?username=<?php echo $row_rs_users['username']; ?>">Eliminar</a></td>
      </tr>
      <?php } while ($row_rs_users = mysql_fetch_assoc($rs_users)); ?>
      <tr>
        <td height="26" colspan="5" align="center"><a href="add_user.php">Agregar</a></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    </body>
</html>
<?php
mysql_free_result($rs_users);
?>
