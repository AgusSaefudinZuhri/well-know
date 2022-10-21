<?php
//date_default_timezone_set("Asia/Jakarta");
$host2	= "localhost";
$user2	= "root";
$pass2	= "";
$db2	= "pwmall_db";
//$website="http://localhost/akunting";
$link2 = mysql_connect($host2, $user2, $pass2, true);
if (!$link2) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected2 = mysql_select_db($db2, $link2);

if (!$db_selected2) {
    die ('Can\'t use foo : ' . mysql_error());
}


?>