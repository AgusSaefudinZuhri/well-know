<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			
			$id 	= mysqli_real_escape_string($_POST["id"]);
			$cekTxt	= "SELECT * FROM g_kurs WHERE id = '".$id."'";
			$cekQry	= mysqli_query( $cekTxt );
			
			if( mysqli_num_rows( $cekQry ) == 0 ) {
			
			$txt = "
				INSERT INTO g_kurs(
					id,
					nmkurs,
					excbuy,
					excsell,
					status 
					) 
				VALUES(
					'".$id."',
					'".mysqli_real_escape_string($_POST["nmkurs"])."', 
					'".xNumber($_POST["excbuy"])."', 
					'".xNumber($_POST["excsell"])."',
					'1' 
					)
				";
			//echo $txt;
			$simpan=mysqli_query($txt);
		
			if($simpan) echo 'success';
			else echo $errTxt;
			}
			else echo T_("ID is already exist");
		break;
		
		case "1":
			$txt = "
				UPDATE g_kurs 
				SET 
					nmkurs	= '".mysqli_real_escape_string($_POST["nmkurs"])."', 
					excbuy	= '".xNumber($_POST["excbuy"])."', 
					excsell	= '".xNumber($_POST["excsell"])."'
				WHERE id='".$_GET["id"]."'";
//			echo $txt;
			$simpan=mysqli_query($txt);
			
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;
	}
?>