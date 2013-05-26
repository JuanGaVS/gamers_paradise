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
$query_rs_gender = "SELECT distinct gender FROM tb_contestant";
$rs_gender = mysql_query($query_rs_gender, $localhost) or die(mysql_error());
$row_rs_gender = mysql_fetch_assoc($rs_gender);
$totalRows_rs_gender = mysql_num_rows($rs_gender);

mysql_select_db($database_localhost, $localhost);
$query_rs_locale = "SELECT distinct locale FROM tb_contestant";
$rs_locale = mysql_query($query_rs_locale, $localhost) or die(mysql_error());
$row_rs_locale = mysql_fetch_assoc($rs_locale);
$totalRows_rs_locale = mysql_num_rows($rs_locale);

mysql_select_db($database_localhost, $localhost);
$query_rs_minage = "SELECT distinct age_range_min FROM tb_contestant";
$rs_minage = mysql_query($query_rs_minage, $localhost) or die(mysql_error());
$row_rs_minage = mysql_fetch_assoc($rs_minage);
$totalRows_rs_minage = mysql_num_rows($rs_minage);

mysql_select_db($database_localhost, $localhost);
$query_rs_maxage = "SELECT distinct age_range_max FROM tb_contestant";
$rs_maxage = mysql_query($query_rs_maxage, $localhost) or die(mysql_error());
$row_rs_maxage = mysql_fetch_assoc($rs_maxage);
$totalRows_rs_maxage = mysql_num_rows($rs_maxage);

mysql_select_db($database_localhost, $localhost);
$query_rs_Contestants = "SELECT contestant_id, first_name, middle_name, last_name, gender, locale, age_range_min, age_range_max, birthday, date_added FROM tb_contestant ORDER BY contestant_id ASC";
$rs_Contestants = mysql_query($query_rs_Contestants, $localhost) or die(mysql_error());
$row_rs_Contestants = mysql_fetch_assoc($rs_Contestants);
$totalRows_rs_Contestants = mysql_num_rows($rs_Contestants);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Filtrar Concursantes</h2>
<p>Seleccione únicamente los campos que desea filtrar:</p>
<form id="form1" name="form1" method="post" action="">
  <table width="256" border="1">
    <tr>
      <th width="131" scope="row">Campo</th>
      <td width="109" align="center"><strong>Valor</strong></td>
    </tr>
    <tr>
      <th scope="row">Género</th>
      <td><label for="select_gender"></label>
        <select name="select_gender" id="select_gender">
          <option value="0" <?php if (!(strcmp(0, $row_rs_gender['gender']))) {echo "selected=\"selected\"";} ?>>No Seleccionado</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rs_gender['gender']?>"<?php if (!(strcmp($row_rs_gender['gender'], $row_rs_gender['gender']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_gender['gender']?></option>
          <?php
} while ($row_rs_gender = mysql_fetch_assoc($rs_gender));
  $rows = mysql_num_rows($rs_gender);
  if($rows > 0) {
      mysql_data_seek($rs_gender, 0);
	  $row_rs_gender = mysql_fetch_assoc($rs_gender);
  }
?>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Locale</th>
      <td><label for="select_locale"></label>
        <select name="select_locale" id="select_locale">
          <option value="0" <?php if (!(strcmp(0, $row_rs_locale['locale']))) {echo "selected=\"selected\"";} ?>>No Seleccionado</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rs_locale['locale']?>"<?php if (!(strcmp($row_rs_locale['locale'], $row_rs_locale['locale']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_locale['locale']?></option>
          <?php
} while ($row_rs_locale = mysql_fetch_assoc($rs_locale));
  $rows = mysql_num_rows($rs_locale);
  if($rows > 0) {
      mysql_data_seek($rs_locale, 0);
	  $row_rs_locale = mysql_fetch_assoc($rs_locale);
  }
?>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Edad Mínima</th>
      <td><label for="select2"></label>
        <select name="select_minage" id="select2">
          <option value="0" <?php if (!(strcmp(0, $row_rs_minage['age_range_min']))) {echo "selected=\"selected\"";} ?>>No Seleccionado</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rs_minage['age_range_min']?>"<?php if (!(strcmp($row_rs_minage['age_range_min'], $row_rs_minage['age_range_min']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_minage['age_range_min']?></option>
          <?php
} while ($row_rs_minage = mysql_fetch_assoc($rs_minage));
  $rows = mysql_num_rows($rs_minage);
  if($rows > 0) {
      mysql_data_seek($rs_minage, 0);
	  $row_rs_minage = mysql_fetch_assoc($rs_minage);
  }
?>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Edad Máxima</th>
      <td><select name="select_minage2" id="select_minage">
        <option value="0" <?php if (!(strcmp(0, $row_rs_maxage['age_range_max']))) {echo "selected=\"selected\"";} ?>>No Seleccionado</option>
        <?php
do {  
?>
        <option value="<?php echo $row_rs_maxage['age_range_max']?>"<?php if (!(strcmp($row_rs_maxage['age_range_max'], $row_rs_maxage['age_range_max']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rs_maxage['age_range_max']?></option>
        <?php
} while ($row_rs_maxage = mysql_fetch_assoc($rs_maxage));
  $rows = mysql_num_rows($rs_maxage);
  if($rows > 0) {
      mysql_data_seek($rs_maxage, 0);
	  $row_rs_maxage = mysql_fetch_assoc($rs_maxage);
  }
?>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Fecha Like desde</th>
      <td><label for="data_added_to"></label>
      <input type="date" name="data_added_since" id="data_added_since" /></td>
    </tr>
    <tr>
      <th scope="row">Fecha Lile hasta</th>
      <td><label for="data_added_to"></label>
      <input type="date" name="data_added_to" id="data_added_to" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btn_filter" id="btn_filter" value="Filtrar" />        <input type="button" name="btn_cancel" id="btn_cancel" value="Cancelar" /></th>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<table border="1">
  <tr>
    <td>ID Concursante</td>
    <td>Primer Nombre</td>
    <td>Segundo Nombre</td>
    <td>Apellidos</td>
    <td>Género</td>
    <td>Locale</td>
    <td>Edad desde</td>
    <td>Edad hasta</td>
    <td>Cumpleaños</td>
    <td>Fecha Like</td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_rs_Contestants['contestant_id']; ?></td>
    <td><?php echo $row_rs_Contestants['first_name']; ?></td>
    <td><?php echo $row_rs_Contestants['middle_name']; ?></td>
    <td><?php echo $row_rs_Contestants['last_name']; ?></td>
    <td><?php echo $row_rs_Contestants['gender']; ?></td>
    <td><?php echo $row_rs_Contestants['locale']; ?></td>
    <td><?php echo $row_rs_Contestants['age_range_min']; ?></td>
    <td><?php echo $row_rs_Contestants['age_range_max']; ?></td>
    <td><?php echo $row_rs_Contestants['birthday']; ?></td>
    <td><?php echo $row_rs_Contestants['date_added']; ?></td>
  </tr>
  <?php } while ($row_rs_Contestants = mysql_fetch_assoc($rs_Contestants)); ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs_gender);

mysql_free_result($rs_locale);

mysql_free_result($rs_minage);

mysql_free_result($rs_maxage);

mysql_free_result($rs_Contestants);
?>
