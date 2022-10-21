<?php include_once('includes/config.php');
if(mysql_num_rows(mysql_query("SELECT * FROM g_member WHERE userid='".$_GET["id"]."' "))>0 ) echo "success"; else echo "error";
?>