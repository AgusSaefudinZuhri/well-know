<?php
include('includes/config.php'); 

switch($_GET["a"]) {
	case "0":	
		$cek=mysql_num_rows(mysql_query("SELECT * FROM g_guser WHERE nama='".$_POST["nama"]."'"));
	
		if($cek>0) echo T_("The Group Name you choose is already taken. Please choose another Group Name.");
		else {
			$simpan=mysql_query("
				INSERT INTO g_guser(
					nama, 
					keterangan, 
					status
					) 
				VALUES(
					'".mysql_real_escape_string($_POST["nama"])."',
					'".mysql_real_escape_string($_POST["keterangan"])."', 
					'1'
					)"
				);
	
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		}
		break;
	
	case "1":
		$cek=mysql_num_rows(mysql_query("SELECT * FROM g_guser WHERE nama='".$_POST["nama"]."' AND id!='".$_GET["id"]."'"));
	
		if($cek>0) echo T_("The Group Name you choose is already taken. Please choose another Group Name.");
		else {

		$update=mysql_query("
			UPDATE g_guser 
			SET 
			nama		='".mysql_real_escape_string($_POST["nama"])."',
			keterangan	='".mysql_real_escape_string($_POST["keterangan"])."'
			WHERE id	='".$_GET["id"]."'
			");
			
		if($update) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		}

	break;
}
?>