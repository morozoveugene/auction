<?php session_start(); 
/*if($_SESSION['name']) {
	echo "<script>location.href='../';</script>";
};*/ ?>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css"/>
	<meta name="theme-color" content="#000">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="../jquery.js"></script>
	<script src="../alert/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../alert/dist/sweetalert2.css">
	<title>Cоздание аукциона | NicePrice</title>
</head>




<body class="logon_content">
<!--                                                           -->
<div class="nav_top">
	<div class="aligner">
		<a class="logon" href="../">Главная</a>
		<a class="logon" href="../">Аукционы</a>
		<a class="logon" href="../">О компании</a>
		<a class="logon" href="../">Контакты</a>
	</div>
</div>

<!--          -->

<div class="aligner">

<div class="card" style="margin: 10px auto; max-width: 640px;">

<div class="create_auct_title">Создание аукциона</div>

<form action='' method='post'>
	<table width="100%" cellspacing="10">
		<tr> 	<td>Название опроса</td><td><input type="text" name="a_name" required/></td>	</tr>
		<tr> 	<td>Фотография опроса</td><td><input type="text" name="a_pic" required/></td>	</tr>
			<tr> 	<td>Время начала</td><td><input type="date" name="a_time[]" style="width: 50%; "required/><input type="time" name="a_time[]"  style="width: 50%; "required/></td>	</tr>
		<tr> 	<td>Средняя цена товара</td><td><input type="text" name="a_price" required/></td>	</tr>
		<tr> 	<td>Ставка монет</td><td><input type="text" name="a_money" required/></td>	</tr>
		<tr valign="top"> 	<td>Описание товара</td><td><textarea rows="10" name="a_desc"></textarea></td>	</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" value="Создать аукцион" name="a_send"/></td>
		</tr> 
	</table>
</form>

<?
if(isset($_POST['a_send'])) {
	include "../config.php";$k = date('Y-m-d H:i:s');
	$time = $_POST['a_time'][0]." ".$_POST['a_time'][1].":00";
	if($sql = mysql_query("INSERT INTO auction VALUES('', '".$_POST['a_name']."', '".$_POST['a_pic']."', '".$time."', '".$_POST['a_price']."', '".$_POST['a_money']."', '".$_POST['a_desc']."', '".$k."','', 1)")) {	echo "<script>swal({  title: 'Аукцион добавлен',  text: \"\",  type: 'success', showConfirmButton: false, showCancelButton: false});setTimeout(function(){location.href='../auction'}, 2000); </script>";	}
	mysql_close();
}
?>


</div>

</div>

</body>
