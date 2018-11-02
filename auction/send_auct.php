<?php 

			include "../config.php";
				$auct = mysql_fetch_array(mysql_query("SELECT * FROM auction WHERE id = ".$_POST['auct_id']));
				$user = mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE login='".$_POST['name']."'"));
				
					if($user['coins']>0) {
						$s = $user['coins'] - $_POST['stav'];
							if(mysql_query("UPDATE user SET coins = ".$s." WHERE login = '".$_POST['name']."'")) {
								
								if(mysql_query("UPDATE auction SET winner = '".$_POST['name']."', timer = '".date('Y-m-d H:i:s')."' WHERE id = ".$_POST['auct_id'])) {
									
									if(mysql_query("INSERT INTO auction_users VALUES ('', '".$_POST['auct_id']."', '".$_POST['name']."')")) {
							
									}
										
								} 
								
							} else {
								echo "<script>swal('Ошибка сервера');</script>";
							}
					} else {
						echo "<script>swal('У Вас закончились монеты');</script>";
					}
			mysql_close();

	?>