<?php session_start(); ?>
<title>Аукцион | NicePrice</title>
<?php include "../head.php"; ?>
<div class='aligner'>

<br>
<div class="left_auction">
	<?
	if($_GET['id']) {
		include "../config.php";
			$auct = mysql_fetch_array(mysql_query("SELECT * FROM auction WHERE id = ".$_GET['id']));
		echo "<div class='left_auction_title'>".$auct['name']."</div>";
		echo "<img src='".$auct['pic']."' style='max-width:100%;'>";
		echo "<div class='left_auction_desc'>".$auct['desc']."</div>";
		mysql_close();
	}
	?>
</div>

<div class="right_auction">

<form method="POST" action="" id="myform">



	<?
	if($_GET['id']) {
		include "../config.php";
			$auct = mysql_fetch_array(mysql_query("SELECT * FROM auction WHERE id = ".$_GET['id']));
			$user = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE login = '".$_SESSION['name']."'"));
			echo "<div class='right_auction_coins'>Количество Ваших монет: ".$user['coins']."</div>";		
			echo "<div align='center'>"; ?>
			
			 <script>  
			 
        function show()     {  $.ajax({              url: "getinfo.php?id=<? echo $_GET['id']; ?>",                  cache: false,                  success: function(html){                      $(".right_auction_counter").html(html);                  }              });          }       

		function show2()     {  $.ajax({              url: "getbutton.php?id=<? echo $_GET['id']; ?>",                  cache: false,                  success: function(html){                      $(".res").html(html);                  }        });          }       
        $(document).ready(function(){              show();   show2();           setInterval('show()',1000);  setInterval('show2()',1000);          });  
		
    </script>  

	<?php	echo "<div class='right_auction_counter'>"; 
				
			echo"</div>
			</div>";		
			echo "<div align='center' style='color: white;'>Ставка:<br><div class='right_auction_stavka'>"; 
				if($auct['coins']>0) {echo $auct['coins']." монет(-ы)";} 
					else {echo "Бесплатно";} 
			echo "</div>";		
			
			echo "<div align='center' style='padding-top: 10px; border-top: 1px solid rgba(255,255,255,.1);' class='res'></div>";	
			
			echo "<br><div align='center' style='color: #ccc;'><input type='hidden' name='auct_id' class='auct_id' value='".$_GET['id']."'><input type='hidden' name='name' class='name' value='".$_SESSION['name']."'><b>Текущий победитель:</b><br>"; 
			echo "<div class='success'></div>";
				if($auct['winner']<>"") {echo $auct['winner'];} else {echo "Нет";}
			$userlist = mysql_query("SELECT * FROM auction_users WHERE id_auction = ".$_GET['id']." ORDER BY id DESC LIMIT 4");
			echo "<div class='userlist'>"; 
				while($row = mysql_fetch_array($userlist)) {
					echo "<p class='userlist_user'>".$row['name']."</p>";
				}
			echo "</div>"; 
		mysql_close();
	}
	?>
	
	
	
</form>
</div>

    <script type="text/javascript">
 
         function sender()
         {
                // Отсылаем паметры
                $.ajax({
						url:  'send_auct.php',
                        type: "POST",
						data: {auct_id: $('.auct_id').val() , name: $('.name').val()},
							  success: function(response) {
									$(".success").text("Ставка сделана");
							  } 									 
                        });
 
         }
   </script>


	
<div style="clear: both; margin-bottom: 20px;">	
</div>

