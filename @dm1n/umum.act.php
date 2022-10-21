<?php
include('includes/config.php'); 
$qry=mysql_query("SELECT * FROM g_option ORDER BY id");

while($row=mysql_fetch_array($qry)) {
	if($row["nstatus"]=='1') $value = xnumber($_POST["t".$row["id"]]);
	else $value = mysql_real_escape_string($_POST["t".$row["id"]]);		
	$simpan=mysql_query("
		UPDATE g_option SET
			optvalue	='".$value."'
		WHERE id		='".$row["id"]."'
		");
}

	include('act.umum.tambahan.php');

		if($simpan) echo 'success';
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
?>