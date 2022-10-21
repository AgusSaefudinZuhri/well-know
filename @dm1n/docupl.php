<?php
include('includes/config.php'); 
$path=$img_path.'techdoc/';
$parts = explode(".",$_FILES["fimage"]["name"]);
$end_part = end($parts);

// print_r($_GET);
if (!in_array($end_part, array('jpg','png','gif','pdf'))) echo 'System hanya menerima file dalam format .jpg, .png, .gif, atau .pdf . Mohon menggunakan file yang sesuai';
else
{
echo $thefile;
$nmfile	= str_replace(" ", "_", ( str_replace('.'.$end_part, '', $_FILES["fimage"]["name"]) ) );

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

if(move_uploaded_file($_FILES["fimage"]["tmp_name"],$thefile)) {
	// $uploadfile	= explode("/",$thefile);
	echo 'success|'.$thefile;
}
else echo 'Terjadi kesalahan proses; Mohon ulangi kembali!';

} ?>