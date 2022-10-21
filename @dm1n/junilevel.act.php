<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			$txt = "
				INSERT INTO g_junilevel(
					nmjunilevel,
					minsponsor,
					lvl01,
					lvl02,
					lvl03,
					lvl04,
					lvl05,
					lvl06,
					lvl07,
					lvl08,
					lvl09,
					lvl10,
					rbt01,
					rbt02,
					rbt03,
					rbt04,
					rbt05,
					rbt06,
					rbt07,
					rbt08,
					rbt09,
					rbt10,					
					status 
					) 
				VALUES(
					'".mysqli_real_escape_string($_POST["nmjunilevel"])."', 
					'".xNumber($_POST["minsponsor"])."', 
					'".xNumber($_POST["lvl01"])."',
					'".xNumber($_POST["lvl02"])."',
					'".xNumber($_POST["lvl03"])."',
					'".xNumber($_POST["lvl04"])."',
					'".xNumber($_POST["lvl05"])."',
					'".xNumber($_POST["lvl06"])."',
					'".xNumber($_POST["lvl07"])."',
					'".xNumber($_POST["lvl08"])."',
					'".xNumber($_POST["lvl09"])."',
					'".xNumber($_POST["lvl10"])."',
					'".xNumber($_POST["rbt01"])."',
					'".xNumber($_POST["rbt02"])."',
					'".xNumber($_POST["rbt03"])."',
					'".xNumber($_POST["rbt04"])."',
					'".xNumber($_POST["rbt05"])."',
					'".xNumber($_POST["rbt06"])."',
					'".xNumber($_POST["rbt07"])."',
					'".xNumber($_POST["rbt08"])."',
					'".xNumber($_POST["rbt09"])."',
					'".xNumber($_POST["rbt10"])."',					
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
				UPDATE g_junilevel 
				SET 
					nmjunilevel	= '".mysqli_real_escape_string($_POST["nmjunilevel"])."', 
					minsponsor	= '".xNumber($_POST["minsponsor"])."', 
					lvl01		= '".xNumber($_POST["lvl01"])."',
					lvl02		= '".xNumber($_POST["lvl02"])."',
					lvl03		= '".xNumber($_POST["lvl03"])."',
					lvl04		= '".xNumber($_POST["lvl04"])."',
					lvl05		= '".xNumber($_POST["lvl05"])."',
					lvl06		= '".xNumber($_POST["lvl06"])."',
					lvl07		= '".xNumber($_POST["lvl07"])."',
					lvl08		= '".xNumber($_POST["lvl08"])."',
					lvl09		= '".xNumber($_POST["lvl09"])."',
					lvl10		= '".xNumber($_POST["lvl10"])."',
					rbt01		= '".xNumber($_POST["rbt01"])."',
					rbt02		= '".xNumber($_POST["rbt02"])."',
					rbt03		= '".xNumber($_POST["rbt03"])."',
					rbt04		= '".xNumber($_POST["rbt04"])."',
					rbt05		= '".xNumber($_POST["rbt05"])."',
					rbt06		= '".xNumber($_POST["rbt06"])."',
					rbt07		= '".xNumber($_POST["rbt07"])."',
					rbt08		= '".xNumber($_POST["rbt08"])."',
					rbt09		= '".xNumber($_POST["rbt09"])."',
					rbt10		= '".xNumber($_POST["rbt10"])."'		
					
				WHERE id='".$_GET["id"]."'";
			//echo $txt;
			$simpan=mysqli_query($txt);
			
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;
	}
?>