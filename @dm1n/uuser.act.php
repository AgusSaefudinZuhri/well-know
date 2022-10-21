<?php
include('includes/config.php'); 
		
switch($_GET["a"]) {
	case "0":	
		$cek=mysql_num_rows(mysql_query("SELECT * FROM g_users WHERE username='".$_POST["username"]."'"));
	
		if($cek>0) echo T_("The UserName you choose is already taken. Please choose another UserName.");
		else {
			$simpan=mysql_query("
				INSERT INTO g_users(
					username, 
					password, 
					nama,
					status, 
					grupid
					) 
				VALUES(
					'".mysql_real_escape_string($_POST["username"])."', 
					'".sha1($_POST["password"])."', 
					'".mysql_real_escape_string($_POST["nama"])."', 
					'1', 
					'".$_POST["grup"]."'
					)
				");
		
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		}
		break;
	
	case "1":

		if(isset($_POST["password"]	) and $_POST["password"]!='') {
			
			$simpan=mysql_query("
				UPDATE g_users 
				SET 
					nama	='".mysql_real_escape_string($_POST["nama"])."', 
					password='".sha1($_POST["password"])."', 
					grupid	='".$_POST["grup"]."'  
				WHERE 
					username='".$_GET["id"]."'");
			}
			else {
			$simpan=mysql_query("
				UPDATE g_users 
				SET 
					nama	='".mysql_real_escape_string($_POST["nama"])."', 
					grupid	='".$_POST["grup"]."' 
				WHERE 
					username='".$_GET["id"]."'");
		}
		if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		

	break;		
}
?>