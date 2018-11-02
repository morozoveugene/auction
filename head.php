<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css"/>
	<meta name="theme-color" content="#000">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="../jquery.js"></script>
	<script src="../alert/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../alert/dist/sweetalert2.css">
	<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
</head> 

<!--               ВЕРХНЯЯ НАВИГАЦИЯ             -->
<div class="nav_top">
	<div class="aligner">
	<?php
		if($_SESSION['name']) {
			echo '<a class="logon" href="../profile">Профиль</a>';
		} else {
			echo '<a class="logon" href="../logon">Вход / Регистрация</a>';
		}
	?>
			<div class="icon_panel"></div>
	</div>
</div>

<!--               ЛОГО и Т.Д            -->
<p class="logo" align="center">
	<img src="../img/logo.png" width="200px" style="margin-top: 25px;"/>
	<br>
	<a href="../">Главная</a>
	<a href="../auction">Аукционы</a>
	<a href="#../auction">О компании</a>
	<a href="#../auction">Контакты</a>

</p>







