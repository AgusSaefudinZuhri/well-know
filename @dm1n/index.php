<?php 
/*
if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || 
   $_SERVER['HTTPS'] == 1) ||  
   isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&   
   $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
{
   $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header('HTTP/1.1 301 Moved Permanently');
   header('Location: ' . $redirect);
   exit();
}
else {
	*/
include_once('includes/config.php');
//	echo print_r($_POST);
//echo print_r($_POST);
if (detect_ie()) include('wrongbrowser.php');

else {
	
	if(isset($_GET["msg"])) include('login.php');
	else {
		if (!isset($_SESSION['username_b'])) {
		//echo 'xxx';
				if(isset($_POST['u_username'], $_POST['u_password'],$_POST['submit-type']) and $_POST['submit-type']='user_login')
			{	
//				echo 'yyy';
				$username = mysql_real_escape_string($_POST['u_username']);
				$password = $_POST['u_password'];
		
				$req = mysql_query("SELECT nama, password, grupid FROM g_users WHERE username='".$username."' AND status='1'");
				$dn = mysql_fetch_array($req);
		//		print_r($dn);
		
				if($dn['password']==sha1($password) and mysql_num_rows($req)>0)
				{	
					$form = false;
					$_SESSION['username_b'] = $_POST['u_username'];
					$_SESSION['nama_b'] = $dn['nama'];
					$_SESSION['grup_b'] = $dn['grupid'];
		
					$xry=mysql_query("SELECT * FROM g_huser WHERE grupid='".$dn['grupid']."'");
		//			echo "SELECT * FROM g_huser WHERE grupid='".$dn['grupid']."' AND pvalue='1'";
					while($xrow=mysql_fetch_array($xry)) {
						$_SESSION[$xrow["pmeter"]] = $xrow["pvalue"];
					}
		
					header('Location: ./');
				}
				else
				{
					$form = true;
					$_SESSION["errLogin"] = 1;
					header('Location: ./');
				}
			}
		
			else include('login.php'); 
		}
		else {	
			include('master.php');	
		}
	}
}

 /// }
?>