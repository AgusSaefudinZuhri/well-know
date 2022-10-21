<?php
include_once('includes/config.php'); 

$cStatus='yes';

if(!isset($_SESSION["userid"])) $cStatus = 'no'; 

//echo $_SESSION['tsession'];
$now = date('Y-m-d H:i:s');

//echo $now." > ".date('Y-m-d H:i:s', strtotime($_SESSION['tsession']." + 1 MINUTE"));
if($now>date('Y-m-d H:i:s', strtotime($_SESSION['tsession']." + 15 MINUTE"))) $cStatus='no';
else $_SESSION['tsession'] = $now;

if($cStatus=='no') {
	$helper = array_keys($_SESSION);
    foreach ($helper as $key){
        unset($_SESSION[$key]);
    }
}

echo $cStatus;
?>