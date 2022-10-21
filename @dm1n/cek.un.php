<?php 
include_once('includes/config.php'); 
$cqry	= mysql_query("SELECT * FROM g_member WHERE userid = '".$_GET["id"]."'");
$cek	= mysql_num_rows($cqry);
if($cek=='0') echo 'success'; else echo 'failed';
?>
