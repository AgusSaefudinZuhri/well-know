<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			$txt = "
				INSERT INTO g_jpackage(
					nmjpackage,
					minvalue,
					usrprc,
					mgrprc,
					rebate,
					iconlink,
					status 
					) 
				VALUES(
					'".mysqli_real_escape_string($_POST["nmjpackage"])."', 
					'".xNumber($_POST["minvalue"])."', 
					'".xNumber($_POST["usrprc"])."',
					'".xNumber($_POST["mgrprc"])."',
					'".xNumber($_POST["rebate"])."',
					'".mysqli_real_escape_string($_POST["iconlink"])."',
					'1' 
					)
				";
			//echo $txt;
			$simpan=mysqli_query($txt);
		
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;
		
		case "1":
			$txt = "
				UPDATE g_jpackage 
				SET 
					nmjpackage	= '".mysqli_real_escape_string($_POST["nmjpackage"])."', 
					minvalue	= '".xNumber($_POST["minvalue"])."', 
					usrprc		= '".xNumber($_POST["usrprc"])."',
					mgrprc		= '".xNumber($_POST["mgrprc"])."',
					rebate		= '".xNumber($_POST["rebate"])."',
					iconlink	= '".mysqli_real_escape_string($_POST["iconlink"])."'
				WHERE id='".$_GET["id"]."'";
//			echo $txt;
			$simpan=mysqli_query($txt);
			
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;
	}
?>