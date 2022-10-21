<?php
include('includes/config.php'); 
		
switch($_GET["a"]) {
	case "0":	
		$cek=mysqli_num_rows(mysqli_query("SELECT * FROM g_users WHERE username='".$_POST["username"]."'"));
	
		if($cek>0) echo T_("The UserName you choose is already taken. Please choose another UserName.");
		else {
			$simpan=mysqli_query("
				INSERT INTO g_users(
					username, 
					password, 
					nama,
					status, 
					grupid
					) 
				VALUES(
					'".mysqli_real_escape_string($_POST["username"])."', 
					'".sha1($_POST["password"])."', 
					'".mysqli_real_escape_string($_POST["nama"])."', 
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
			
			$simpan=mysqli_query("
				UPDATE g_users 
				SET 
					nama	='".mysqli_real_escape_string($_POST["nama"])."', 
					password='".sha1($_POST["password"])."', 
					grupid	='".$_POST["grup"]."'  
				WHERE 
					username='".$_GET["id"]."'");
			}
			else {
			$simpan=mysqli_query("
				UPDATE g_users 
				SET 
					nama	='".mysqli_real_escape_string($_POST["nama"])."', 
					grupid	='".$_POST["grup"]."' 
				WHERE 
					username='".$_GET["id"]."'");
		}
		if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		

	break;		
}
?>