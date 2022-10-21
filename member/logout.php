<?php
	
	include_once('includes/config.php');
	
	$cTxt	= "SELECT * FROM g_member WHERE userid='".$_SESSION["userid"]."'";
	$cQry	= mysqli_query( $cTxt );
	$cRow	= mysqli_fetch_array( $cQry );
	if($cRow["mcode"]!='') $mcode	= "?xcb=".$cRow["mcode"]; else $mcode = '';
	
$helper = array_keys($_SESSION);
    foreach ($helper as $key){
        unset($_SESSION[$key]);
    }

header('Location: ./'.$mcode);
die;

?>