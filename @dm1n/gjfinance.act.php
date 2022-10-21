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
					'".mysqli_real_escape_string($_POST["nmgjfinance"])."',
					'".mysqli_real_escape_string($_POST["scdeposit"])."',
					'".mysqli_real_escape_string($_POST["scwithdraw"])."',					
					'1'
					)
				";
			$simpan	= mysqli_query($txt);
			//echo $txt;
			if($simpan) echo 'success';
			else echo $errTxt;
		break;
		
		case "1":
			$txt	= "
				UPDATE g_gjfinance 
				SET 
					nmgjfinance	= '".mysqli_real_escape_string($_POST["nmgjfinance"])."',
					scdeposit	= '".mysqli_real_escape_string($_POST["scdeposit"])."',
					scwithdraw	= '".mysqli_real_escape_string($_POST["scwithdraw"])."',					
				WHERE id='".$_GET["id"]."'
				";
			
			$simpan=mysqli_query($txt);
			//echo $txt;
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;	
	}
?>