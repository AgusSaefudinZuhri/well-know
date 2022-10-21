<?php 
include_once('includes/config.php'); 
$cqry	= mysqli_query("SELECT * FROM g_member WHERE userid = '".$_GET["id"]."'");
$cek	= mysqli_num_rows($cqry);
if($cek=='0') echo 'success'; else echo 'failed';
?>
