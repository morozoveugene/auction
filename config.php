<?php
$servername = "localhost";
$username = "root";
$password = "";	
$dbname = "niceprice";

mysql_connect($servername, $username, $password) or die(mysql_error());

mysql_select_db($dbname) or die(mysql_error());					

mysql_query("set names utf8") or die("set names utf8 falied");

?>
