<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			$simpan=mysqli_query("
				INSERT INTO g_temail(
					nmtemplate,
					cttemplate
					) 
				VALUES(
					'".mysqli_real_escape_string($_POST["nmtemplate"])."', 
					'".htmlspecialchars( mysqli_real_escape_string($_POST["cttemplate"]) )."'
					)
				");
		
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
		
		case "1":
			$simpan=mysqli_query("
				UPDATE g_temail 
				SET 
					cttemplate	='".htmlspecialchars( mysqli_real_escape_string($_POST["cttemplate"]) )."'
				WHERE id='".$_GET["id"]."'");
			
			
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
	}
?>