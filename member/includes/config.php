<?php
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Jakarta");
$host="localhost";
$user="extrogat_dhisca";
$pass="**Dh15ca83##";
$db="extrogat_trading";
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

function shortName ( $x ) {
	$cutOff		= 10;
	if( strlen(	$x ) < ( $cutOff + 3 ) ) $return = $x;
	else $return = substr( $x, 0, $cutOff).'...';
	return $return;
}

function get_goption($id) {
	$ncek=mysql_fetch_array(mysql_query("SELECT * FROM g_option WHERE id='".$id."'"));
	return $ncek["optvalue"];
}

function get_woption($id) {
	$ncek=mysql_fetch_array(mysql_query("SELECT * FROM w_option WHERE id='".$id."'"));
	return $ncek["optvalue"];
}
function get_woption_value ($z) {
	$vow=mysql_fetch_array(mysql_query("SELECT * FROM w_option WHERE id='".$z."'"));
	return $vow["optvalue"];
}

function get_woption_header ($z) {
	$vow=mysql_fetch_array(mysql_query("SELECT * FROM w_option WHERE id='".$z."'"));
	return $vow["optheader"];
}

function xNumber($x) {
	return str_replace(",","", mysql_real_escape_string($x));
}

function defCustStatus($x) {
	switch($x) {
		case "1" : $return = T_("Ya"); break;	
		case "0" : $return = T_("Tidak"); break;			
	}
	return $return;
}

function stAktif ($x) {

switch( $x ) { 
	case "1": $return = T_("Aktif"); break; 
	case "0": $return = T_("Tdk Aktif"); break; 
	} 
	return $return;
}

	function getCard() {

		$ok=0;
		while($ok!=1) {
			$Allowed_Charaters	= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$novoucher			= substr(str_shuffle($Allowed_Charaters), 0, 10);
			$cek=mysql_num_rows(mysql_query("SELECT * FROM g_card WHERE novoucher='".$novoucher."'"));
			if($cek==0) $ok=1;
		}		
		return $novoucher;	
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
//$adm=10;
//$auto=5;

$company_userid	=	"master";
$namaperusahaan	=	get_goption ('1');
$namaweb		=	get_goption ('2');
$descweb		=	get_goption ('3');
$syscurrency	=	get_goption ('4');
$dcurrency		=	get_goption ('5');
$bsLink			=	get_goption ('6');

$contractPeriod	= 	get_goption ('7');
$adminCharge	=	get_goption ('8');
$wdMin			=	get_goption ('9');
$wdMinFund		=	get_goption ('10');
$wdStartDt		=	get_goption ('11');
$wdEndDt		=	get_goption ('12');

$rankExch	= get_goption ('13');
$coinKurs	= get_goption ('14');
$idrCurrency= get_goption ('4');

/*
$reInvRegMin	=	get_goption ('10');
$buyConv		= 	get_goption ('11');
$sellConv		= 	get_goption ('12');
$cashWDadmin	= 	get_goption ('13');
$dailyreturn	=   get_goption ('14'); // '0.5';	

$deltaConv		=	$buyConv - $sellConv;
*/
/*
$monthlyPINup	= 	get_goption ('8');
$adminCharge	=	get_goption ('9');
$wdMin			=	get_goption ('10');


/*
$adminCharge	=	get_goption ('7');
$wdMin			=	get_goption ('8');
$cscMin			=	get_goption ('9');
$regMin			=	get_goption ('10');
$stdReturn		=	get_goption ('11');
$incReturn		=	get_goption ('12');
$masakontrak	=	get_goption ('13');

$smartApps		=	get_goption ('15');
$smartMall		=	get_goption ('16');
$smartShare		=	get_goption ('17');
$wscMin			=	get_goption ('18');
*/

$wscMin2 = $regMin;

$mbrHeader		= "DPI";

$bsMbrlink		=	$bsLink.'member/';
$mbrlink		= 	$bsLink	.'r/';
$mbrqrcode		=	$bsMbrlink . 'upl/qr/';

	$searchBtn	= T_("Search");
	$searchPrm	= T_("Search Parameter");
	$batalBtn	= T_("Cancel");
	$simpanBtn	= T_("Save");
	$nonAktifkanBtn	= T_("DeActivate");
	$aktifkanBtn	= T_("Activate");
	$stAktif	= T_("Active");
	$stTdkAktif	= T_("Not Active");
	$stSemua	= T_("All");


$coredir	=	get_woption ('4'); //"content/core/"; // get_boption ('4').'/';

$dlang		=	get_woption ('5');
$frontpage	=	get_woption('6');
$kodeetik	=	get_woption('7');
$email 		=	get_woption('8');

$thumbproduk_width = 150;
$thumbproduk_height = 150;

$iconpic_width = 100;
$iconpic_height = 100;

$max_upload_size = 1000;
$img_path		= '../images/';

?>