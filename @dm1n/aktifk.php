<?php
include('includes/config.php'); 
		switch($_GET["t"]) {
			case "3" : $table = "g_jmember"; $id="id"; break;	
			case "4" : $table = "g_jkomisi"; $id="id"; break;				
			case "5" : $table = "g_jpackage"; $id="id"; break;
			case "6" : $table = "g_junilevel"; $id="id"; break;				
			case "7" : $table = "g_country"; $id="id"; break;
//			case "8" : $table = "g_jproduk"; $id="id"; break;
			case "9" : $table = "g_member"; $id="parentid"; break;
			
			case "12" : $table = "g_jreward"; $id="id"; break;
			case "13" : $table = "g_jreward2"; $id="id"; break;
			case "15" : $table = "g_kurs"; $id="id"; break;
			case "16" : $table = "g_gjfinance"; $id="id"; break;
			case "17" : $table = "g_jfinance"; $id="id"; break;
			

		}

		$update=mysql_query("UPDATE ".$table." SET status='1' WHERE ".$id."='".$_GET["id"]."'");
		if($update) echo 'success';
		else echo $errTxt;		

?>