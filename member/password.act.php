<?php
include('includes/config.php'); 
		
switch($_GET["a"]) {
	case "0" :
		if($_POST["npass"]==$_POST["kpass"]) {
		
			$cek = mysqli_fetch_array(mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));
		//	echo $cek["password"]."==".sha1($_POST["cpass"]);
			if($cek["password"]==sha1($_POST["cpass"])) {	
				$tqry="
					UPDATE g_member 
					SET xpass='".$_POST["npass"]."', password='".sha1($_POST["npass"])."' 
					WHERE userid='".$_GET["id"]."'
				";
		//		echo $tqry;	
				$simpan=mysqli_query($tqry);
				
				if($simpan) echo 'success';
				else echo $salahProses; 
			}
			else echo T_("Password Saat Ini Salah!!!");
		}
		else echo T_("Password Baru Tidak Cocok!!!");
		break;

	case "1" :
		if($_POST["npass2"]==$_POST["kpass2"]) {
		
			$cek = mysqli_fetch_array(mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."'"));
		//	echo $cek["password"]."==".sha1($_POST["cpass"]);
			if($cek["password2"]==sha1($_POST["cpass2"]) or $cek["password2"]=='') {	
				$tqry="
					UPDATE g_member 
					SET xpass2='".$_POST["npass2"]."',  password2='".sha1($_POST["npass2"])."' 
					WHERE userid='".$_GET["id"]."'
				";
		//		echo $tqry;	
				$simpan=mysqli_query($tqry);
				
				if($simpan) echo 'success';
				else echo $salahProses; 
			}
			else echo T_("Password Saat Ini Salah!!!");
		}
		else echo T_("Password Baru Tidak Cocok!!!");
		break;
}

?>