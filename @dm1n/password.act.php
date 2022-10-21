<?php
include('includes/config.php'); 

		if($_POST["npass"]==$_POST["kpass"]) {
		
		$tqry="
			UPDATE g_users 
			SET password='".sha1($_POST["npass"])."' 
			WHERE username='".$_GET["id"]."'
		";
//		echo $tqry;	
		$simpan=mysqli_query($tqry);
		
		if($simpan) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator
"); 
		}
		else echo T_("The Pasword doesn't Match!!!");


?>