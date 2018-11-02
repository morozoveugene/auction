<?php session_start(); 
if($_SESSION['name']) {
	echo "<script>location.href='../profile';</script>";
}; ?>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css"/>
	<meta name="theme-color" content="#000">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="../jquery.js"></script>
	<script src="../alert/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../alert/dist/sweetalert2.css">
	<title>Панель входа | NicePrice</title>
</head>




<body class="logon_content">
<!--                                                           -->
<div class="nav_top">
	<div class="aligner">
		<a class="logon" href="../">Главная</a>
		<a class="logon" href="../auction">Аукционы</a>
		<a class="logon" href="../">О компании</a>
		<a class="logon" href="../">Контакты</a>
	</div>
</div>

<!--          -->

<div class="aligner">

<form class="frm" method='post'>
<div class="frm_title">Вход</div>
	<table action='' class="auth" cellspacing="10">
		<tr>
			<td><input type="text" name="login" placeholder="Логин"/></td>
		</tr>
		
		<tr>
			<td><input type="password" name="pass" placeholder="********"/></td>
		</tr>
		
		<tr>
			<td align="right"><input type="submit" value="Войти" name="login_send"/></td>
		</tr> 
	</table>
</form>

<?php
if(isset($_POST['login_send'])) {
	include '../config.php';
			if($sql = mysql_query("SELECT * FROM user WHERE login = '".strtolower($_POST['login'])."'")) {				
			$user = mysql_fetch_assoc($sql);
				if($user['password'] == $_POST['pass']) {
					$_SESSION['name'] = strtolower($user['login']);
					echo "<script>alert('Добро пожаловать ".$user['login']."!'); location.href='./'; </script>";
				} else {
					echo "<script>swal('Неверный пароль!');</script>";
				}
			} else {
				echo "<script>swal('Пользователь не существует!'); </script>";
			}	
		
	mysql_close();
}
?>




<div style="clear: both;"></div>



<form class="frm"  action='' method='post'>
<div class="frm_title">Регистрация</div>
	<table class="reg"  cellspacing="10">
		<tr>
			<td>Логин</td><td><input type="text" name="reg_login" required/></td>
		</tr>
		<tr>
			<td>ФИО</td><td><input type="text" name="reg_fio" required/></td>
		</tr>
		<tr>
			<td>Пароль</td><td><input type="password" name="reg_pass" required/></td>
		</tr>
		<tr>
			<td>Дата рождения</td><td><input type="date" name="reg_bday" required/></td>
		</tr>
		<tr>
			<td>Страна</td><td><input type="text" name="reg_contry" required/></td>
		</tr>
		<tr>
			<td>Область</td><td><input type="text" name="reg_region" required/></td>
		</tr>
		<tr>
			<td>Город</td><td><input type="text" name="reg_city" required/></td>
		</tr>
		<tr>
			<td>Полный адрес</td><td><input type="text" name="reg_adress" required/></td>
		</tr>
		<tr>
			<td>Индекс</td><td><input type="text" name="reg_index" required/></td>
		</tr>
		<tr>
			<td>Телефон</td><td><input type="tel" name="reg_phone" required/></td>
		</tr>
		<tr>
			<td>E-mail</td><td><input type="email" name="reg_email" required/></td>
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" value="Зарегистрироваться" name="reg_send"/></td>
		</tr> 
	</table>
</form>

<?php
if(isset($_POST['reg_send'])) {
	include('../config.php');
	if ((strlen($_POST['reg_pass']) >= 6) && (strlen($_POST['reg_pass']) <= 32)) {
			if($log = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE login = '".$_POST['reg_login']))){
				echo "<script>swal('".$_POST['reg_login']." - логин занят');</script>";
			} else {
							
					mysql_query("INSERT INTO user values('','".strtolower($_POST['reg_login'])."',  '".$_POST['reg_pass']."',  '".$_POST['reg_fio']."',  '".$_POST['reg_bday']."',  '".$_POST['reg_contry']."', '".$_POST['reg_region']."',   '".$_POST['reg_city']."',  '".$_POST['reg_adress']."',   '".$_POST['reg_index']."',   '".$_POST['reg_phone']."',   '".$_POST['reg_email']."',  10)") or die(mysql_error());

					echo "<script>alert('Регистрация прошла успешно!', 1000); location.href='./';</script>";
						
			}
		} else {
			echo "<script>swal('Пароль должен быть не менее 6 и не более 32 симоволов');</script>";
		}
	
	mysql_close();
		
	}
?>

</div>

</body>
