<?php
date_default_timezone_set("Asia/Jakarta");
$host="localhost";
$user="root";
$pass="";
$db="goldenwisata";
//$website="http://localhost/akunting";
$link = mysql_connect($host, $user, $pass);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db($db, $link);

if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

function ubahangka($angka) {
	switch ($angka) {
		case "1": $huruf="A"; break;	
		case "2": $huruf="B"; break;	
		case "3": $huruf="C"; break;	
		case "4": $huruf="D"; break;	
		case "5": $huruf="E"; break;	
		case "6": $huruf="F"; break;	
		case "7": $huruf="G"; break;	
		case "8": $huruf="H"; break;	
		case "9": $huruf="I"; break;	
		case "10": $huruf="J"; break;	
		case "11": $huruf="K"; break;	
		case "12": $huruf="L"; break;	
	}
	return $huruf;
}

/*function get_option($id, $x) {
	$ncek=mysqli_fetch_array(mysqli_query("SELECT * FROM e_huser WHERE username='".$id."' AND pmeter='".$x."'"));
	return $ncek["pvalue"];
}*/
$perpage = 20;
$adm=10;
$auto=5;
?>