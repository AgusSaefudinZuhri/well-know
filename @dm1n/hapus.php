<?php
include('includes/config.php'); 
		
		switch($_GET["t"]) {
			case "1" : $table = "g_users"; $id="username"; break;	
			case "2" : $table = "g_guser"; $id="id"; break;	
			case "10" : $table = "g_transfer"; $id="id"; break;	
			case "11" : $table = "g_reward"; $id="id"; break;	
			case "12" : $table = "g_komisi"; $id="id"; break;				
			case "13" : $table = "g_rodetail"; $id="id"; break;				
			case "14" : $table = "g_techdoc"; $id="id"; break;				

		}

		$hapus=mysqli_query("DELETE FROM ".$table." WHERE ".$id."='".$_GET["id"]."'");
//echo "DELETE FROM ".$table." WHERE ".$id."='".$_GET["id"]."'";
//echo "DELETE FROM ".$table." WHERE ".$id."='".$_GET["id"]."'";
		if($hapus) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");
?>