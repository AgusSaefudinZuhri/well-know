<?php
include('includes/config.php'); 
$path=$img_path.'doc/';
$parts = explode(".",$_FILES["ximage1"]["name"]);
$end_part = end($parts);

// print_r($_GET);
if (!in_array($end_part, array('jpg','png','gif','pdf'))) echo 'System only receives file with format .jpg, .png, .gif, or .pdf . Please use appropriate format';
else
{
//echo $thefile;
$nmfile	= str_replace(" ", "_", ( str_replace('.'.$end_part, '', $_FILES["ximage1"]["name"]) ) );

if(file_exists($path.$nmfile.'.'.$end_part)) {
	$oke=0;
	$hitung=1;
	while($oke==0) {
		if(!file_exists($path.$nmfile.'_'.$hitung.'.'.$end_part)) {
			$thefile=$path.$nmfile.'_'.$hitung.'.'.$end_part;
			$oke=1;		
		}
		else $hitung++;
	}
}
else $thefile=$path.$nmfile.'.'.$end_part;

if(move_uploaded_file($_FILES["ximage1"]["tmp_name"],$thefile)) {
	// $uploadfile	= explode("/",$thefile);
	echo 'success||'.str_replace("/","|",$thefile);
}
else echo  T_("There are errors in process. If the problem persists, please contact The Administrator");	

	
} ?>