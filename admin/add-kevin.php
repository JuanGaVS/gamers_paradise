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
        
        $user->userAdd();
        
        
        
        
        
	/*
  $insertSQL = sprintf("INSERT INTO tb_users (username, first_name, last_name, email, salt, password) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
*/
        
  $insertGoTo = "kevin.php";
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
</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="304" border="1">
    <tr>
      <th width="152" scope="row">Usuario</th>
      <td width="136"><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
    </tr>
    <tr>
      <th scope="row">Nombre</th>
      <td><label for="first_name"></label>
      <input type="text" name="first_name" id="first_name" /></td>
    </tr>
    <tr>
      <th scope="row">Apellidos</th>
      <td><label for="last_name"></label>
      <input type="text" name="last_name" id="last_name" /></td>
    </tr>
    <tr>
      <th scope="row">Correo</th>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <th scope="row">Contraseña</th>
      <td><span id="sprypassword">
      <label for="password"></label>
      <input name="password" type="password" id="password" value="" />
      <span class="passwordRequiredMsg">A value is required.</span><span class="passwordMinCharsMsg">Tamaño mínimo no alcanzado.</span></span></td>
    </tr>
    <tr>
      <th scope="row">Reescriba Contraseña</th>
      <td><span id="sprypassword2">
      <label for="password_retype"></label>
      <input type="password" name="password_retype" id="password_retype" />
      <span class="passwordRequiredMsg">A value is required.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span></span></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btn-add" id="btn-add" value="Agregar" />
      <input type="reset" name="btn-reset" id="btn-reset" value="Borrar Datos" /></th>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword", {minChars:5});
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2", {minChars:5});
</script>
</body>
</html>