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
$query_rs_Contestants = "SELECT contestant_id, first_name, last_name, gender, locale, birthday, date_added FROM tb_contestant ORDER BY contestant_id ASC";
$rs_Contestants = mysql_query($query_rs_Contestants, $localhost) or die(mysql_error());
$row_rs_Contestants = mysql_fetch_assoc($rs_Contestants);
$totalRows_rs_Contestants = mysql_num_rows($rs_Contestants);
 
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
        <p>CONCURSANTES
  <?php
        // put your code here
        
        ?>
        </p>
        <?php if ($totalRows_rs_Contestants > 0) { // Show if recordset not empty ?>
  <p><a href="#">Filtrar</a></p>
  <?php } // Show if recordset not empty ?>
        <?php if ($totalRows_rs_Contestants > 0) { // Show if recordset not empty ?>
          <table border="1">
            <tr>
              <td>ID Concursante</td>
              <td>ombre</td>
              <td>Apellidos</td>
              <td>Género</td>
              <td>Locale</td>
              <td>Cumpleaños</td>
              <td>Fecha Like</td>
            </tr>
            <?php do { ?>
              <tr>
                <td><?php echo $row_rs_Contestants['contestant_id']; ?></td>
                <td><?php echo $row_rs_Contestants['first_name']; ?></td>
                <td><?php echo $row_rs_Contestants['last_name']; ?></td>
                <td><?php echo $row_rs_Contestants['gender']; ?></td>
                <td><?php echo $row_rs_Contestants['locale']; ?></td>
                <td><?php echo $row_rs_Contestants['birthday']; ?></td>
                <td><?php echo $row_rs_Contestants['date_added']; ?></td>
              </tr>
              <?php } while ($row_rs_Contestants = mysql_fetch_assoc($rs_Contestants)); ?>
          </table>
          <?php } // Show if recordset not empty ?>
        <?php if ($totalRows_rs_Contestants == 0) { // Show if recordset empty ?>
          <div class="rs-empty">No hay registros de concursantes</div>
          <?php } // Show if recordset empty ?>
    </body>
</html>
<?php
mysql_free_result($rs_Contestants);
?>
