<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			$txt = "
				INSERT INTO g_jkomisi(
					nmjkomisi,
					freqjkomisi,
					scrjkomisi,
					status 
					) 
				VALUES(
					'".mysqli_real_escape_string($_POST["nmjkomisi"])."',
					'".$_POST["freqjkomisi"]."',
					'".mysqli_real_escape_string($_POST["scrjkomisi"])."',
					'1' 
					)
				";
//			echo $txt;
			$simpan=mysqli_query($txt);
		
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
		
		case "1":
			$txt = "
				UPDATE g_jkomisi 
				SET 
					nmjkomisi	= '".mysqli_real_escape_string($_POST["nmjkomisi"])."',
					freqjkomisi	= '".$_POST["freqjkomisi"]."',
					scrjkomisi	= '".mysqli_real_escape_string($_POST["scrjkomisi"])."'
				WHERE id='".$_GET["id"]."'";
//			echo $txt;
			$simpan=mysqli_query($txt);
			
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		break;
	}
?>