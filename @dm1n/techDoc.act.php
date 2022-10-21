<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			$txt = "
				INSERT INTO g_techdoc (
					id,
					deskripsi,
					doclink,
					tglpost,
					waktupost,
					status 
					) 
				VALUES(
					NULL,
					'".mysql_real_escape_string($_POST["deskripsi"])."', 
					'".$_POST["doclink"]."', 
					'".date('Y-m-d')."',
					'".date('H:i:s')."',
					'1' 
					)
				";
//			echo $txt;
			$simpan=mysql_query($txt);
		
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;

/*		

		case "1":
			$txt = "
				UPDATE g_jpackage 
				SET 
					nmjpackage	= '".mysql_real_escape_string($_POST["nmjpackage"])."', 
					hargavl		= '".xNumber($_POST["hargavl"])."', 
					roimonthprc	= '".xNumber($_POST["roimonthprc"])."',
					sponsorprc	= '".xNumber($_POST["sponsorprc"])."',
					devprc		= '".xNumber($_POST["devprc"])."',
					devdailycap	= '".xNumber($_POST["devdailycap"])."',
					rabatst		= '".$_POST["rabatst"]."',
					rabatprc	= '".xNumber($_POST["rabatprc"])."',
					rabatlvlcap	= '".xNumber($_POST["rabatlvlcap"])."',
					iconlink	= '".mysql_real_escape_string($_POST["iconlink"])."'
				WHERE id='".$_GET["id"]."'";
//			echo $txt;
			$simpan=mysql_query($txt);
			
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
		*/
	}
?>