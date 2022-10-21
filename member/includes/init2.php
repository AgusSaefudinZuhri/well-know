<?php
session_start();

if(!isset($_SESSION['accountname']) and isset($_COOKIE['accountname'], $_COOKIE['password']))
{
	$cnn = mysqli_query('select password,id from accounts where username="'.mysqli_real_escape_string($_COOKIE['username']).'"');
	$dn_cnn = mysqli_fetch_array($cnn);
	if(sha1($dn_cnn['password'])==$_COOKIE['password'] and mysqli_num_rows($cnn)>0)
	{
		$_SESSION['accountname'] = $_COOKIE['username'];
		$_SESSION['accountid'] = $dn_cnn['id'];
	}
}
?>