<?php
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Jakarta");
$host="localhost";
$user="root";
$pass="";
$db="ismart";
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

/*
function get_woption_value ($z) {
	$vow=mysql_fetch_array(mysql_query("SELECT * FROM w_option WHERE id='".$z."'"));
	return $vow["optvalue"];
}

function get_woption_header ($z) {
	$vow=mysql_fetch_array(mysql_query("SELECT * FROM w_option WHERE id='".$z."'"));
	return $vow["optheader"];
}
*/

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

/*
function get_woption($id) {
	$ncek=mysql_fetch_array(mysql_query("SELECT * FROM w_option WHERE id='".$id."'"));
	return $ncek["optvalue"];
}
*/

function get_goption($id) {
	$ncek=mysql_fetch_array(mysql_query("SELECT * FROM g_option WHERE id='".$id."'"));
	return $ncek["optvalue"];
}

function xNumber($x) {
	return str_replace(",","", mysql_real_escape_string($x));
}

function detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

include_once("gettext.php");

$perpage = 20;
$adm=10;
$auto=5;

$company_userid	=	"master";
$namaperusahaan	=	get_goption ('1');
$namaweb		=	get_goption ('2');
$descweb		=	get_goption ('3');
$dcurrency		=	get_goption ('4');
$scConversion	=	get_goption ('5');
$regFee			=	get_goption ('6');
$adminCharge	=	get_goption ('7');
$wdMin			=	get_goption ('8');
$wscMin			=	get_goption ('9');
$regMin			=	get_goption ('10');
$stdReturn		=	get_goption ('11');
$incReturn		=	get_goption ('12');
$masakontrak	=	get_goption ('13');
$bsLink			=	get_goption ('14');
$smartApps		=	get_goption ('15');
$smartMall		=	get_goption ('16');
$smartShare		=	get_goption ('17');

$wscMin2 = 20.00;

$bsMbrlink		=	$bsLink.'member/';
$mbrlink		= 	$bsLink	.'r/';
$mbrqrcode		=	$bsMbrlink . 'upl/qr/';

//$deliveryCost	=	get_goption ('7');
//$regkomisi		=	get_goption ('7');
//$pointper		=	get_goption ('7');

$minWD			= '10';

$thumbproduk_width = 150;
$thumbproduk_height = 150;

$iconpic_width = 100;
$iconpic_height = 100;

$max_upload_size = 1000;
$img_path		= '../images/';


?>