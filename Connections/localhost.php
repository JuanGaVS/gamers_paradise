<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = "mysql.flashfusioner.com";
$database_localhost = "gamer_paradise";
$username_localhost = "jorgemiranda";
$password_localhost = "pwd123";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 
?>