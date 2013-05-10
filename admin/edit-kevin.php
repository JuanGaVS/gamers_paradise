<?php require_once('../Connections/conn.php'); ?>
<?php require_once('../entities/User.php'); ?>
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

    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    
	$user = new User();
        
        $user->setUsername($username);
        $user->setFirst_name($first_name);
        $user->setLast_name($last_name);
        $user->setEmail($email);
        $user->setSalt();
        
        
        if(isset($password)){
            $user->setPassword($password);
            $user->userUpdate();
        }
        else{
            $user->userUpdateWithoutPassword();
        }
        
        
        
    
    
  /*$updateSQL = sprintf("UPDATE tb_users SET first_name=%s, last_name=%s, email=%s, password=%s WHERE username=%s",
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['username'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());*/

  $updateGoTo = "kevin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rs_editKevin = "-1";
if (isset($_GET['username'])) {
  $colname_rs_editKevin = $_GET['username'];
}
mysql_select_db($database_conn, $conn);
$query_rs_editKevin = sprintf("SELECT username, first_name, last_name, email FROM tb_users WHERE username = %s", GetSQLValueString($colname_rs_editKevin, "text"));
$rs_editKevin = mysql_query($query_rs_editKevin, $conn) or die(mysql_error());
$row_rs_editKevin = mysql_fetch_assoc($rs_editKevin);
$totalRows_rs_editKevin = mysql_num_rows($rs_editKevin);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="369" border="1">
    <tr>
      <th width="164" scope="row">Usuario</th>
      <td width="189"><label for="username"></label>
      <input readonly="readonly" value="<?php echo $row_rs_editKevin['username']; ?>" type="text" name="username" id="username" />        <label for="username"></label></td>
    </tr>
    <tr>
      <th scope="row">Nombre</th>
      <td><label for="first_name">
        <input value="<?php echo $row_rs_editKevin['first_name']; ?>" type="text" name="first_name" id="first_name" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Apellidos</th>
      <td><input value="<?php echo $row_rs_editKevin['last_name']; ?>" type="text" name="last_name" id="last_name" /></td>
    </tr>
    <tr>
      <th scope="row">Correo</th>
      <td><input value="<?php echo $row_rs_editKevin['email']; ?>" type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <th scope="row">Contraseña</th>
      <td><input name="password" type="password" id="password" value="" /></td>
    </tr>
    <tr>
      <th scope="row">Reescriba contraseña</th>
      <td><input type="password" name="password_retype" id="password_retype" /></td>
    </tr>
    <tr>
      <th scope="row"><input type="submit" name="button_update" id="button_update" value="Actualizar" /></th>
      <td><input type="reset" name="button_reset" id="button_reset" value="Limpiar" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</body>
</html>
<?php
mysql_free_result($rs_editKevin);
?>
