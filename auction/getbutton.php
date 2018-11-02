<?php
include '../config.php';
$auct = mysql_fetch_array(mysql_query("SELECT * FROM auction WHERE id = ".$_GET['id']));


if($auct['status'] <> 0) { 	echo "<input type='hidden' name='stav' value='".$auct['coins']."'><input type='button' onclick='sender()' class='right_auction_button' name='send_auct' value='Сделать ставку'/>"; } else {
	echo "Аукцион закончен";
}


mysql_close();
?>