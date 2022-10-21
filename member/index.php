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
	if(isset($_SESSION["hasilStatus"])) include('register2.php');
	else if(isset($_GET["msg"])) include('login.php');
	else {
		if (!isset($_SESSION['userid'])) {
		//echo 'xxx';
				if( isset($_POST['submit-type']) and $_POST['submit-type']=='regOnline' ) {
					include('signup.act.php');
					$_SESSION["hasilStatus"] = $hasilStatus;
					$_SESSION["memberid"] = $userid;
					header('Location: ./');
				}
		
				else if($_POST['submit-type']=='user_login')
			{	
				$username = mysqli_real_escape_string($GLOBALS['$link'], $_POST['u_username']);
				$password = $_POST['u_password'];
		
				$txt = "
					SELECT
						userid, 
						nmmember, 
						password, 
						blokir, 
						parentid,
						flogin,
						level
					FROM g_member 
					WHERE userid='".$username."' AND status='1'
					";
					$mysqli = new mysqli("localhost","root","","extrogat_trading");
					// var_dump($_POST);
					$username = mysqli_real_escape_string($link, $_POST['u_username']);
					// $username = $_POST['u_username'];
					$password = $_POST['u_password'];
	
					$req = $mysqli -> query("SELECT * FROM g_member WHERE userid='".$username."' AND status='1'");
//					echo $txt;
				$dn = mysqli_fetch_array($req);
				print_r($dn);
		
				if($dn['password']==sha1($password) and mysqli_num_rows($req)>0)
				{	
					
					if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
					  	$browser = 'Internet explorer';
					 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
						 $browser = 'Internet explorer';
					 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
					   $browser =  'Mozilla Firefox';
					 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
					   $browser =  'Google Chrome';
					 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
					   $browser =  "Opera Mini";
					 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
					   $browser =  "Opera";
					 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
					   $browser =  "Safari";
					 else
					   $browser =  'Others';
					
					$updLoginTxt = "UPDATE g_session SET status='0' WHERE userid='".$dn['userid']."'";
					mysqli_query($GLOBALS['$link'], $updLoginTxt);
					
					$insSesTxt	 = "
						INSERT INTO g_session (
							id,
							userid,
							userip,
							userbrowser,
							logintgl,
							loginwaktu,
							updtgl,
							updwaktu,
							status
						)
						VALUES (
							NULL,
							'".$dn['userid']."',
							'".$_SERVER['REMOTE_ADDR']."',
							'".$browser."',
							
							'".date('Y-m-d')."',
							'".date('H:i:s')."',
							'".date('Y-m-d')."',
							'".date('H:i:s')."',
							'1'
						)
					";
					mysqli_query($GLOBALS['$link'], $insSesTxt);
					
					$form = false;
					$_SESSION['userid'] 	= $dn['userid'];
					$_SESSION['nmmember'] 	= $dn['nmmember'];
					//$_SESSION['jpackage'] 	= $dn['jpackage'];
					$_SESSION['blokir'] 	= $dn['blokir'];
					$_SESSION['parentid']	= $dn['parentid'];
					//$_SESSION['level']		= $dn['level'];
					$_SESSION['firstlogin']	= $dn['flogin'];
					$_SESSION['tsession']	= date('Y-m-d H:i:s');
					$_SESSION['locale']		= 'id_ID';
		
		
					header('Location: ./');
				}
				else
				{
					$form = true;
					$msg = 'UserName atau Password yang dimasukkan salah!!!';
					$_SESSION["errLogin"] = 1;
					if(isset($_GET["xcb"])) $belakang="?xcb=".$_GET["xcb"]; 
					else $belakang="";
					header('Location: ./'.$belakang);
				}
			}
		
			else include('login.php'); 
		}
		else {	
			include('master.php');	
		}
	}
}

// }
?>
