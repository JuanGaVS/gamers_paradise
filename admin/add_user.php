<?php 
if (!isset($_SESSION)) { session_start(); }
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
}
require_once('../Connections/localhost.php');
require_once('../entities/User.php');
require_once('../dal/UserDAL.php');

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
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
	$user->setPassword($password);
        
        $uDAL = new UserDAL();
        
	$uDAL->userAdd($user);
	
	/*
	$insertSQL = sprintf("INSERT INTO tb_users (username, first_name, last_name, email, password, salt) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
  */

  $insertGoTo = "users.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />

<style>
.validation-error{color:#F00;}
</style>

</head>

<body>
<form id="form_add_user" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="309" border="1">
    <tr>
      <th width="191" scope="row">Usuario</th>
      <td width="102"><label for="username"></label>
      <input type="text" name="username" id="username" required="required" /></td>
    </tr>
    <tr>
      <th scope="row">Nombre</th>
      <td><label for="first_name"></label>
      <input type="text" name="first_name" id="first_name" required="required" /></td>
    </tr>
    <tr>
      <th scope="row">Apellido</th>
      <td><label for="last_name"></label>
      <input type="text" name="last_name" id="last_name" required="required" /></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><label for="email"></label>
      <input type="email" name="email" id="email" required="required" /></td>
    </tr>
    <tr>
      <th scope="row">Contraseña</th>
      <td><span id="sprypassword1">
        <label for="password"></label>
        <input type="password" name="password" id="password" required="required" />
      <span class="passwordRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <th scope="row">Confirmación Contraseña</th>
      <td><span id="sprypassword2">
        <label for="password_retype"></label>
        <input type="password" name="password_retype" id="password_retype" required="required" />
      <span class="passwordRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="button_add" id="button_add" value="Agregar" />
      <input type="reset" name="button_reset" id="button_reset" value="Limpiar" /></th>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword2");
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/validate.js" type="text/javascript"></script>
</body>
</html>