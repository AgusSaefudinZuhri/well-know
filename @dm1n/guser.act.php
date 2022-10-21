<?php
include('includes/config.php'); 

switch($_GET["a"]) {
	case "0":	
		$cek=mysqli_num_rows(mysqli_query("SELECT * FROM g_guser WHERE nama='".$_POST["nama"]."'"));
	
		if($cek>0) echo T_("The Group Name you choose is already taken. Please choose another Group Name.");
		else {
			$simpan=mysqli_query("
				INSERT INTO g_guser(
					nama, 
					keterangan, 
					status
					) 
				VALUES(
					'".mysqli_real_escape_string($_POST["nama"])."',
					'".mysqli_real_escape_string($_POST["keterangan"])."', 
					'1'
					)"
				);
	
			if($simpan) echo 'success';
			else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		}
		break;
	
	case "1":
		$cek=mysqli_num_rows(mysqli_query("SELECT * FROM g_guser WHERE nama='".$_POST["nama"]."' AND id!='".$_GET["id"]."'"));
	
		if($cek>0) echo T_("The Group Name you choose is already taken. Please choose another Group Name.");
		else {

		$update=mysqli_query("
			UPDATE g_guser 
			SET 
			nama		='".mysqli_real_escape_string($_POST["nama"])."',
			keterangan	='".mysqli_real_escape_string($_POST["keterangan"])."'
			WHERE id	='".$_GET["id"]."'
			");
			
		if($update) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		}

	break;
}
?>