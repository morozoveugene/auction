<?php
include '../config.php';
$auct = mysql_fetch_array(mysql_query("SELECT * FROM auction WHERE id = ".$_GET['id']));
$k = strtotime(date('Y-m-d H:i:s'));
$k1 = strtotime($auct['timer']);

$z = 60 -  ($k-$k1);
if($z < 0){
	echo "Время вышло";
	if($auct['status'] <> 0) { 	mysql_query("UPDATE auction SET status = 0 WHERE id = ".$_GET['id']);}
}
	else {echo $z." сек.";}

mysql_close();
?>