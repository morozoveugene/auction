<?php session_start(); ?>
<title>Аукционы | NicePrice</title>
<?php include "../head.php"; ?>
<div class='aligner'>
	<p align="center">
		<a class="create_auct" href="create.php">Создать аукцион</a>
	</p>
	
	 <script>  
        function show()  
        {  
            $.ajax({  
                url: "select.php",  
                cache: false,  
                success: function(html){  
                    $("#content").html(html);  
                }  
            });  
        }  
      
        $(document).ready(function(){  
            show();  
            setInterval('show()',1000);  
        });  
    </script>  
	
<div id="content">

</div>
	
</div>

