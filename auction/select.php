<?php 
		include "../config.php";
		$date_in = date("Y-m-d 00:00:00"); $date_out = date("Y-m-d 23:59:59");
		if($sql = mysql_query("SELECT * FROM auction WHERE time >= '".$date_in."' AND time <= '".$date_out."' ")) {
			while($row = mysql_fetch_assoc($sql)) {
			$date1 = new DateTime($row['time']);
				$k = date('Y-m-d H:i:s');
			$date2 = new DateTime($k);	
				echo "<div class='auction_form'>";
					echo "<div class='auction_form_title'>".$row['name']."</div>";
					echo "<div class='auction_form_pic' style='background: url(".$row['pic']."); background-position: center; background-color: white; background-size: cover;'></div>";
					if($date1 > $date2) {
						echo "<div class='auction_form_time'><b>Время начала:</b></br>".$row['time']."</div>";
					}
					if($row['coins']>0) {echo "<div align='center'><div class='auction_form_stavka'>".$row['coins']." монеты</div></div>";}
					else {echo "<div align='center'><div class='auction_form_stavka'>Бесплатно</div></div>";}						
					if($date1 <= $date2) {
						if($row['status'] == 0 ) {echo "<div align='center' style='padding: 10px;'>Аукцион закончен</div>";} else {
							echo "<div align='center'><a href='show.php?id=".$row['id']."' class='auction_form_link'>Перейти к аукциону</a></div>";
						}
						
					}
				echo "</div>";
			}
		} else {
			echo "<div>Сегодня аукционов пока нет...</div>";
		}
		mysql_close();
	?>