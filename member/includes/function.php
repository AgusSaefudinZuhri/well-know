<?php 
include_once('config.php'); 
function sanitize_input($txt) {
	return htmlspecialchars(mysql_real_escape_string($txt));
}

function out_decode($txt) {
	return htmlspecialchars_decode($txt);
}

function make_slug($txt) {
	$slug=str_replace("'","",str_replace('"','',str_replace(" ","-",str_replace("&","",strtolower(strip_tags($txt))))));
	$test=mysql_num_rows(mysql_query("SELECT * FROM w_pcontent WHERE pslug='".$slug."'"));
	if($test>0) {
		$ok=0;
		$hitz=1;
		while($ok!=1) {
			if(mysql_num_rows(mysql_query("SELECT * FROM w_pcontent WHERE pslug='".$slug.$hitz."'"))==0) {
				$slug=$slug.$hitz;
				$ok=1;				
			}
			$hitz++;
		}
	}
	return $slug;
}

function make_slug2($txt, $id) {
	$slug=str_replace("'","",str_replace('"','',str_replace(" ","-",str_replace("&","",strtolower(strip_tags($txt))))));
	$test=mysql_num_rows(mysql_query("SELECT * FROM w_pcontent WHERE pslug='".$slug."' AND pid!='".$id."'"));
	if($test>0) {
		$ok=0;
		$hitz=1;
		while($ok!=1) {
			if(mysql_num_rows(mysql_query("SELECT * FROM w_pcontent WHERE pslug='".$slug.$hitz."' AND pid!='".$id."'"))==0) {
				$slug=$slug.$hitz;
				$ok=1;				
			}
			$hitz++;
		}
	}
	return $slug;
}

function make_cslug($txt) {
	$slug=str_replace("'","",str_replace('"','',str_replace(" ","-",str_replace("&","",strtolower(strip_tags($txt))))));
	$test=mysql_num_rows(mysql_query("SELECT * FROM w_ccontent WHERE cslug='".$slug."'"));
	if($test>0) {
		$ok=0;
		$hitz=1;
		while($ok!=1) {
			if(mysql_num_rows(mysql_query("SELECT * FROM w_ccontent WHERE cslug='".$slug.$hitz."'"))==0) {
				$slug=$slug.$hitz;
				$ok=1;				
			}
			$hitz++;
		}
	}
	return $slug;
}

function make_cslug2($txt, $id) {
	$slug=str_replace("'","",str_replace('"','',str_replace(" ","-",str_replace("&","",strtolower(strip_tags($txt))))));
	$test=mysql_num_rows(mysql_query("SELECT * FROM w_ccontent WHERE cslug='".$slug."' AND cid!='".$id."'"));
	if($test>0) {
		$ok=0;
		$hitz=1;
		while($ok!=1) {
			if(mysql_num_rows(mysql_query("SELECT * FROM w_ccontent WHERE cslug='".$slug.$hitz."' AND cid!='".$id."'"))==0) {
				$slug=$slug.$hitz;
				$ok=1;				
			}
			$hitz++;
		}
	}
	return $slug;
}


function ubahppath($id,$ppath) {
	$cqry=mysql_query("SELECT * FROM w_pages WHERE pparent='".$id."'");
	if(mysql_num_rows($cqry)>0) {
		while($crow=mysql_fetch_array($cqry)) {
			$npath=$ppath.".".sprintf('%02d',$crow["porder"]).sprintf('%03d',$crow["id"]);
			//echo $npath;
			$ubah=mysql_query("UPDATE w_pages SET ppath='".$npath."' WHERE id='".$crow["id"]."'");
			ubahppath($crow["id"],$npath);
		}
	}
}

function addtinymce() { ?>
			tinymce.init({
  selector: '.pcontent',
  height: 260,
  entity_encoding : "raw",
  theme: 'modern',
	plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools jbimages'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
  toolbar2: 'link image jbimages | print preview | forecolor backcolor emoticons ',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ]
 });
	
<?php }