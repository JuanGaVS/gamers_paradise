<?php require_once('../Connections/conn.php'); ?>
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

$maxRows_rs_kevin = 10;
$pageNum_rs_kevin = 0;
if (isset($_GET['pageNum_rs_kevin'])) {
  $pageNum_rs_kevin = $_GET['pageNum_rs_kevin'];
}
$startRow_rs_kevin = $pageNum_rs_kevin * $maxRows_rs_kevin;

mysql_select_db($database_conn, $conn);
$query_rs_kevin = "SELECT username, first_name, last_name, email FROM tb_users ORDER BY username ASC";
$query_limit_rs_kevin = sprintf("%s LIMIT %d, %d", $query_rs_kevin, $startRow_rs_kevin, $maxRows_rs_kevin);
$rs_kevin = mysql_query($query_limit_rs_kevin, $conn) or die(mysql_error());
$row_rs_kevin = mysql_fetch_assoc($rs_kevin);

if (isset($_GET['totalRows_rs_kevin'])) {
  $totalRows_rs_kevin = $_GET['totalRows_rs_kevin'];
} else {
  $all_rs_kevin = mysql_query($query_rs_kevin);
  $totalRows_rs_kevin = mysql_num_rows($all_rs_kevin);
}
$totalPages_rs_kevin = ceil($totalRows_rs_kevin/$maxRows_rs_kevin)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <tr>
    <td width="131">Usuario</td>
    <td width="136">Nombre</td>
    <td width="134">Apellidos</td>
    <td width="122">Correo Electrónico</td>
    <td width="122">Acciones</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rs_kevin['username']; ?></td>
      <td><?php echo $row_rs_kevin['first_name']; ?></td>
      <td><?php echo $row_rs_kevin['last_name']; ?></td>
      <td><?php echo $row_rs_kevin['email']; ?></td>
      <td><a href="edit-kevin.php?username=<?php echo $row_rs_kevin['username']; ?>">Editar</a> | <a href="kevin.php?username=<?php echo $row_rs_kevin['username']; ?>">Eliminar</a></td>
    </tr>
    <?php } while ($row_rs_kevin = mysql_fetch_assoc($rs_kevin)); ?>
    <tr>
      <td colspan="5" align="center"><a href="add-kevin.php">Agregar</a></td>
    </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs_kevin);
?>
