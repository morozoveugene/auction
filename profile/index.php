<?php session_start(); 
if(!$_SESSION['name']) {
	echo "<script>location.href='../logon';</script>";
}; if($_GET['go']=='exit') {session_destroy(); echo "<script>location.href='../';</script>";} ?>
	

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css"/>
	<meta name="theme-color" content="#000">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="../jquery.js"></script>
	<script src="../alert/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../alert/dist/sweetalert2.css">
	<title>Профиль | NicePrice</title>
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

	<div class="frm_title" style="padding: 20px;">Ваш профиль</div>
	<?php 
	include '../config.php';
	$user = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE login='".$_SESSION['name']."'"));
	echo '<table class="card" cellspacing="20">';
			echo '
			<tr>
				<td><b>Ф.И.О</b></td><td>'.$user['fio'].'</td>
			</tr>
			<tr>
				<td><b>Дата рождения</b></td><td>'.$user['bday'].'</td>
			</tr>
			<tr>
				<td><b>Адрес</b></td><td>'.$user['contry'].', '.$user['region'].', '.$user['city'].',  '.$user['adress'].'</td>
			</tr>
			<tr>
				<td><b>Монеты</b></td><td>'.$user['coins'].'</td>
			</tr>
			<tr>
				<td></td><td align="right"><a class="exit" href="?go=exit">Выход</a></td>
			</tr>
			';
	echo '</table>';	
	mysql_close();
	?>
	
</div>

</body>
