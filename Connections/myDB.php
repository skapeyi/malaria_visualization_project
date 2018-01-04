<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myDB = "localhost";
$database_myDB = "mvpdemo";
$username_myDB = "root";
$password_myDB = "";
$myDB = mysql_pconnect($hostname_myDB, $username_myDB, $password_myDB) or trigger_error(mysql_error(),E_USER_ERROR); 
?>