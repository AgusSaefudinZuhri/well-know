<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			$txt = "
				INSERT INTO g_excrate(
					id,
					negara,
					beli,
					jual,
					status 
					) 
				VALUES(
					NULL,
					'".mysql_real_escape_string($_POST["negara"])."', 
					'".xNumber($_POST["beli"])."', 
					'".xNumber($_POST["jual"])."',
					'1' 
					)
				";
//			echo $txt;
			$simpan=mysql_query($txt);
		
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
		
		case "1":
			$txt = "
				UPDATE g_excrate 
				SET 
					negara	= '".mysql_real_escape_string($_POST["negara"])."', 
					beli	= '".xNumber($_POST["beli"])."', 
					jual	= '".xNumber($_POST["jual"])."'
				WHERE id='".$_GET["id"]."'";
//			echo $txt;
			$simpan=mysql_query($txt);
			
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
	}
?>