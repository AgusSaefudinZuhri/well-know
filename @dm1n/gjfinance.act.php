<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			
			
			$txt	= "
				INSERT INTO g_gjfinance(
					id,
					nmgjfinance,
					scdeposit,
					scwithdraw,					
					status
					) 
				VALUES(
					NULL,
					'".mysql_real_escape_string($_POST["nmgjfinance"])."',
					'".mysql_real_escape_string($_POST["scdeposit"])."',
					'".mysql_real_escape_string($_POST["scwithdraw"])."',					
					'1'
					)
				";
			$simpan	= mysql_query($txt);
			//echo $txt;
			if($simpan) echo 'success';
			else echo $errTxt;
		break;
		
		case "1":
			$txt	= "
				UPDATE g_gjfinance 
				SET 
					nmgjfinance	= '".mysql_real_escape_string($_POST["nmgjfinance"])."',
					scdeposit	= '".mysql_real_escape_string($_POST["scdeposit"])."',
					scwithdraw	= '".mysql_real_escape_string($_POST["scwithdraw"])."',					
				WHERE id='".$_GET["id"]."'
				";
			
			$simpan=mysql_query($txt);
			//echo $txt;
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;	
	}
?>