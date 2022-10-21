<?php include_once('includes/config.php');
if(mysqli_num_rows(mysqli_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."' "))>0 ) echo "success"; else echo "error";
?>