<?php
include('includes/config.php'); 
// $path=$pathtemplate;

	$thumbproduk_width = 250;
	$thumbproduk_height = 100;

	$maxheight	= $thumbproduk_height;
	$maxwidth	= $thumbproduk_width;

	$cropwidth	= round($maxwidth/2);
	$cropheight	= round($maxheight/2);


$uploaded_file = $_FILES["fimage"]["tmp_name"];
$file_size		= filesize($uploaded_file);

if($file_size<=($max_upload_size*1024)) {

	$path		= $img_path.'service/';
	chmod($path,0755);
	$parts		= explode(".",$_FILES["fimage"]["name"]);
	$end_part 	= strtolower(end($parts));

	if (!in_array($end_part, array('jpg','png'))) 
		echo T_("System only received .jpg or .png files!!!");
	else
	{
		switch($end_part) {
			case 'jpg': $src = imagecreatefromjpeg($uploaded_file); break;
			case 'png': $src = imagecreatefrompng($uploaded_file); break;			
		}
		//echo $thefile;
		
		list($width,$height)=getimagesize($uploaded_file);
//echo $width.'|'.$height.'<br/>';		
		
		if($width> (($cropwidth/$cropheight)*$height)) {
			$newheight	= $maxheight;
			$newwidth	= ($width/$height) * $newheight;
		}
		else {
			$newwidth	= $maxwidth;
			$newheight	= ($height/$width) * $newwidth;
		}
		
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		imagealphablending( $tmp, false );
		imagesavealpha( $tmp, true );
		
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
//		imagecopy($tmp,$src,0,0,0,0,$newwidth,$newheight,$width);

		$centerX	= round($newwidth/2);
		$centerY	= round($newheight/2);

//echo $centerX.'|'.$centerY;

		$tmp2=imagecreatetruecolor($maxwidth,$maxheight);
		$x1		= $centerX-$cropwidth;
		$y1		= $centerY-$cropheight;
//echo $x1.'-'.$y1;
		imagealphablending( $tmp2, false );
		imagesavealpha( $tmp2, true );

		imagecopy($tmp2,$tmp,0,0,$x1,$y1,$maxwidth,$maxheight);
		
		$nmfile	= strtolower(str_replace('.'.$end_part, '', $_FILES["fimage"]["name"]));
		
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
//		echo $thefile;
		
		switch($end_part) {
			case 'jpg' : $process = imagejpeg($tmp2,$thefile,100); break;
			case 'png' : $process = imagepng($tmp2,$thefile); break;
		}

		if($process) echo 'success|'.$thefile;
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		
		imagedestroy($src);
		imagedestroy($tmp);
	} 
}
else echo T_('File size cannot exceed ').number_format($max_file_size).' kb.'.$file_size;
?>