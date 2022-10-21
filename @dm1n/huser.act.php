<?php
include('includes/config.php'); 
	$hapus=mysqli_query("DELETE FROM g_huser WHERE grupid='".$_GET["id"]."'");					
	for($i=1; $i<=9; $i++) {
	if($_POST["x".$i]=='yes') $pvalue='1';
	else $pvalue='0';
	$simpan=mysqli_query("
			INSERT INTO g_huser(grupid, pmeter, pvalue) VALUES ('".$_GET["id"]."', 'x".$i."', '".$pvalue."');");		
	}
	echo 'success';
?>