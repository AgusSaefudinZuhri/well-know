<?php
include('includes/config.php'); 
		

		$hapus0 = mysql_query("DELETE FROM g_member   WHERE userid = '".$_GET["id"]."'");
		$hapus1 = mysql_query("DELETE FROM g_upline   WHERE userid = '".$_GET["id"]."'");
		$hapus2 = mysql_query("DELETE FROM g_unilevel WHERE userid = '".$_GET["id"]."'");

		if( $hapus0 and $hapus1 and $hapus2 ) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");
?>