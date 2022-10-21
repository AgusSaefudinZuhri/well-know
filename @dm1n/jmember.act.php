<?php
include('includes/config.php'); 
		
	switch($_GET["a"]) {
		case "0":
			
			$c1Txt	= "SELECT * FROM g_jmember WHERE id='".$_POST["jmemberid"]."'";
			$c1Qry	= mysql_query( $c1Txt );
			
			$c2Txt	= "SELECT * FROM g_jmember WHERE rank='".$_POST["rank"]."' AND status='1' ";
			$c2Qry	= mysql_query( $c2Txt );
			
			if(mysql_num_rows($c1Qry)==0 and mysql_num_rows($c2Qry)==0) {
			
			$txt	= "
				INSERT INTO g_jmember(
					id,
					nmjmember,
					rank, 
					reqscript,
					status
					) 
				VALUES(
					'".mysql_real_escape_string($_POST["jmemberid"])."',
					'".mysql_real_escape_string($_POST["nmjmember"])."',
					'".xNumber($_POST["rank"])."',
					'".mysql_real_escape_string($_POST["reqscript"])."',
					'1'
					)
				";
			$simpan	= mysql_query($txt);
			//echo $txt;
			if($simpan) echo 'success';
			else echo $errTxt;
			}
			else echo "ID or Rank is already exist.";
		break;
		
		case "1":
			$txt	= "
				UPDATE g_jmember 
				SET 
					nmjmember	= '".mysql_real_escape_string($_POST["nmjmember"])."',
					reqscript	= '".mysql_real_escape_string($_POST["reqscript"])."'
				WHERE id='".$_GET["id"]."'
				";
			
			$simpan=mysql_query($txt);
			//echo $txt;
			if($simpan) echo 'success';
			else echo $errTxt;		
		break;	
	}
?>