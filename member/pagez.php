<?php 

if(!isset($_GET["pg"])) $now = '1'; else $now = $_GET["pg"];

if($pages=='1' and $now = '1') {}
else {
	if($now<'5') { if($pages<='5') $max=$pages; else $max='5'; $min=1; }
	else if($pages-$now>4) { $max=$now+2; $min=$now-2;}
	else {$max=$pages; $min=$pages-4;}
	if($now!='1') echo '<a href="javascript: void(0);" onclick="cari(\'1\')"><<</a>&nbsp;&nbsp;<a href="javascript: void(0);" onclick="cari(\''.($now-1).'\')"><</a>&nbsp;&nbsp;';
	for($i=$min; $i<=$max; $i++) {
		if($i!=$now) echo '<a href="javascript: void(0);" onclick="cari(\''.$i.'\')">'.$i.'</a>&nbsp;&nbsp;';
		else echo $now.'&nbsp;&nbsp;';
	}
	if($pages>'1' and $now!=$pages) echo '<a href="javascript: void(0);" onclick="cari(\''.($now+1).'\')">></a>&nbsp;&nbsp;<a href="javascript: void(0);" onclick="cari(\''.$pages.'\')">>></a>';

}

?>