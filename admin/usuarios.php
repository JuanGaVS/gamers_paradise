<?php require_once('../Connections/fio1.php'); ?>
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

$maxRows_rs_usuarios = 10;
$pageNum_rs_usuarios = 0;
if (isset($_GET['pageNum_rs_usuarios'])) {
  $pageNum_rs_usuarios = $_GET['pageNum_rs_usuarios'];
}
$startRow_rs_usuarios = $pageNum_rs_usuarios * $maxRows_rs_usuarios;

mysql_select_db($database_fio1, $fio1);
$query_rs_usuarios = "SELECT username, first_name, last_name, email FROM tb_users ORDER BY username ASC";
$query_limit_rs_usuarios = sprintf("%s LIMIT %d, %d", $query_rs_usuarios, $startRow_rs_usuarios, $maxRows_rs_usuarios);
$rs_usuarios = mysql_query($query_limit_rs_usuarios, $fio1) or die(mysql_error());
$row_rs_usuarios = mysql_fetch_assoc($rs_usuarios);

if (isset($_GET['totalRows_rs_usuarios'])) {
  $totalRows_rs_usuarios = $_GET['totalRows_rs_usuarios'];
} else {
  $all_rs_usuarios = mysql_query($query_rs_usuarios);
  $totalRows_rs_usuarios = mysql_num_rows($all_rs_usuarios);
}
$totalPages_rs_usuarios = ceil($totalRows_rs_usuarios/$maxRows_rs_usuarios)-1;
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
        
        <?php
        // put your code here
        
        ?>
        <table border="1">
          <tr>
            <td width="190">Usuario</td>
            <td width="199">Nombre</td>
            <td width="195">Apellido</td>
            <td width="160">Correo Electronico</td>
            <td width="155">Acciones</td>
          </tr>
          <?php do { ?>
            <tr>
              <td><?php echo $row_rs_usuarios['username']; ?></td>
              <td><?php echo $row_rs_usuarios['first_name']; ?></td>
              <td><?php echo $row_rs_usuarios['last_name']; ?></td>
              <td><?php echo $row_rs_usuarios['email']; ?></td>
              <td><a href="fioedit.php?username=<?php echo $row_rs_usuarios['username']; ?>">Editar</a> | <a href="usuarios.php?username=<?php echo $row_rs_usuarios['username']; ?>">Eliminar</a></td>
            </tr>
            <tr>
              <td colspan="5" align="center"><a href="fioagregar.php">Agregar</a></td>
            </tr>
            <?php } while ($row_rs_usuarios = mysql_fetch_assoc($rs_usuarios)); ?>
        </table>
        <p>&nbsp;</p>
    </body>
</html>
<?php
mysql_free_result($rs_usuarios);
?>
