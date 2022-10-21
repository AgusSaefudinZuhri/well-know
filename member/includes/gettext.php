<?php
require_once('gettext/gettext.inc');

if (isset($_SESSION["locale"])) $locale = $_SESSION["locale"];
else {
	$locale = "id_ID";
	$_SESSION["locale"] = "id_ID";	
}

//echo $locale;
$domain = 'message';
$encoding = 'UTF-8';

T_setlocale(LC_MESSAGES, $locale);
// Set the text domain as 'messages'
//$domain = 'messages';
T_bindtextdomain($domain, './includes/locales/');
T_bind_textdomain_codeset($domain, $encoding);
T_textdomain($domain);

