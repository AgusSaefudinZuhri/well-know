<?php
include('includes/config.php'); 
// $path=$pathtemplate;
	$maxheight	= $iconpic_height;
	$maxwidth	= $iconpic_width;

	$cropwidth	= round($maxwidth/2);
	$cropheight	= round($maxheight/2);


$uploaded_file = $_FILES["fimage"]["tmp_name"];
$file_size		= filesize($uploaded_file);

if($file_size<=($max_upload_size*1024)) {

	$path		= $img_path.'icon/';
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
		
		if($width < $height) {
			$newheight	= $maxheight;
			$newwidth	= ($width/$height) * $newheight;
		}
		else {
			$newwidth	= $maxwidth;
			$newheight	= ($height/$width) * $newwidth;
		}
		
		$tmp=imagecreatetruecolor($maxwidth,$maxheight);
		
		imagealphablending( $tmp, false );
		$colorTransparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
        imagefill($tmp, 0, 0, $colorTransparent);	
		imagesavealpha( $tmp, true );
		
		$centerX	= round($newwidth/2);
		$centerY	= round($newheight/2);
		$x1			= $centerX-$cropwidth;
		$y1			= $centerY-$cropheight;
		
		imagecopyresampled($tmp,$src,0-$x1,0-$y1,0,0,$newwidth,$newheight,$width,$height);
		
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
			case 'jpg' : $process = imagejpeg($tmp,$thefile,100); header("Content-Type: image/jpeg"); break;
			case 'png' : $process = imagepng($tmp,$thefile); header("Content-Type: image/png"); break;
		}

		if($process) echo 'success|'.$thefile;
		else echo T_("There are errors in process. If the problem persists, please contact The Administrator");		
		
		imagedestroy($src);
		imagedestroy($tmp);
	} 
}
else echo T_('File size cannot exceed ').number_format($max_file_size).' kb.'.$file_size;
?>