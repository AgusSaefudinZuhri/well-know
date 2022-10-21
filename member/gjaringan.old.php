<?php 
include_once('includes/config.php'); 
include_once('function.php');


$daftar = strtoupper(T_("Register"));
$childlink = '../images/icon/0k.png';
//echo $_GET["id"].'!='.$_SESSION["userid"];
if(isset($_GET["id"]) and $_GET["id"]!=$_SESSION["userid"]) {
	$id=$_GET["id"];
	$judul ='<p class="blacktransparent" style="text-align: center; font-size: 14px; font-weight: bold;margin: 0; color: #000; padding-bottom: 5px;">'. T_('Network of').': '.$id.'</p>';
    	}
else {
	$id=$_SESSION["userid"];
	$judul="";
}
$user0Txt = "SELECT 
	   a.userid,
	   a.nmmember,
	   a.jpackage,
	   a.upline,
	   a.level,
	   a.blokir,
	   c.iconlink,
	   a.parentstatus,
	   d.parentid pupline,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
	FROM g_member a 
	LEFT JOIN g_upline b 	ON a.userid=b.uplid	
	LEFT JOIN g_jpackage c 	ON a.jpackage=c.id
	LEFT JOIN g_member d 	ON a.upline=d.userid
	WHERE a.userid='".$id."'
	";

$user0=mysql_fetch_array(mysql_query( $user0Txt ));

if($user0["parentstatus"]=='1') $icon0=$user0["iconlink"];
else $icon0=$childlink;
if($user0["jpackage"]=='0') $icon0=$childlink;

if(isset($_GET["id"]) and $_GET["id"]!=$_SESSION["userid"]) $prm0="gjaringan.php?id=".$user0["pupline"]; 
else $prm0="";


/*
$c1ki=mysql_query("SELECT 
	   a.userid,
	   a.nmmember
	FROM g_member a 
	WHERE a.upline='".$id."'
	AND a.posisi='ki'
	AND a.status='1'
	");
*/

$cki = explode("|",caripm ($id,'ki'));
//echo caripm ($id,'ki');
//if(mysql_num_rows($c1ki)>0) {

if($cki[0]!="") {
	$text1ki=mysql_query("SELECT 
		   a.userid,
		   a.nmmember,
	   a.jpackage,		   
		   a.blokir,
		   c.iconlink,
	   a.parentstatus,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
		FROM g_member a 
		LEFT JOIN g_upline b
		ON a.userid=b.uplid	
		LEFT JOIN g_jpackage c 
		ON a.jpackage=c.id
		WHERE a.upline='".$cki[1]."'
		AND a.posisi='ki'
		AND a.status='1'
		");
//echo $text1ki;
	$user1ki=mysql_fetch_array($text1ki);
	$userid1ki=$user1ki["userid"];
	$nmmember1ki=$user1ki["nmmember"];
	$jml1ki=T_('Ttl').': '.str_replace(",", ".", number_format($user1ki["jki"])).' | '.str_replace(",", ".", number_format($user1ki["jka"]));
	$lvl1ki=T_('Lvl').':&nbsp;&nbsp;'.$user1ki["lki"].' | '.$user1ki["lka"];
//	$icon1ki=$user1ki["iconlink"];

if($user1ki["parentstatus"]=='1') $icon1ki=$user1ki["iconlink"];
else $icon1ki=$childlink;
if($user1ki["jpackage"]=='0') $icon1ki=$childlink;
	
	$prm1ki="gjaringan.php?id=".$userid1ki;

/*
$c2kiki=mysql_query("SELECT 
	   a.userid,
	   a.nmmember
	FROM g_member a 
	WHERE a.upline='".$userid1ki."'
	AND a.posisi='ki'
	AND a.status='1'
	");
*/

$ckiki = explode("|",caripm ($userid1ki,'ki'));

	
if($ckiki[0]!='') {
//if(mysql_num_rows($c2kiki)>0) {

	$text2kiki=mysql_query("SELECT 
		   a.userid,
		   a.nmmember,a.jpackage,
		   c.iconlink,
	   a.parentstatus,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
		FROM g_member a 
		LEFT JOIN g_upline b
		ON a.userid=b.uplid	
		LEFT JOIN g_jpackage c 
		ON a.jpackage=c.id
		WHERE a.upline='".$ckiki[1]."'
		AND a.posisi='ki'
		AND a.status='1'	
		");
	$user2kiki=mysql_fetch_array($text2kiki);
	$userid2kiki=$user2kiki["userid"];
	$nmmember2kiki=$user2kiki["nmmember"];
	$jml2kiki=T_('Ttl').': '.str_replace(",", ".", number_format($user2kiki["jki"])).' | '.str_replace(",", ".", number_format($user2kiki["jka"]));
	$lvl2kiki=T_('Lvl').':&nbsp;&nbsp;'.$user2kiki["lki"].' | '.$user2kiki["lka"];
//	$icon2kiki=$user2kiki["iconlink"];
if($user2kiki["parentstatus"]=='1') $icon2kiki=$user2kiki["iconlink"];
else $icon2kiki=$childlink;
if($user2kiki["jpackage"]=='0') $icon2kiki=$childlink;
	
	$prm2kiki="gjaringan.php?id=".$userid2kiki;
}
else {
	if($user1ki["blokir"]=='0'  and $user1ki["jpackage"]>'0') {
	$userid2kiki=$daftar;
	$nmmember2kiki="";
	$jml2kiki="";
	$lvl2kiki="";
	$icon2kiki="";
	$prm2kiki="signup.php?upline=".$userid1ki."&sponsor=".$_SESSION["userid"]."&posisi=ki";
	}
	else {
	$userid2kiki="LOCKED";
	$nmmember2kiki="";
	$jml2kiki="";
	$lvl2kiki="";
	$icon2kiki="";
	$prm2kiki="";		
	}
}

/*
$c2kika=mysql_query("SELECT 
	   a.userid,
	   a.nmmember
	FROM g_member a 
	WHERE a.upline='".$userid1ki."'
	AND a.posisi='ka'
	AND a.status='1'
	");
*/

$ckika = explode("|",caripm ($userid1ki,'ka'));

	
if($ckika[0]!='') {

//if(mysql_num_rows($c2kika)>0) {
	
	$text2kika=mysql_query("SELECT 
		   a.userid,
		   a.nmmember,a.jpackage,
		   c.iconlink,
	   a.parentstatus,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
		FROM g_member a 
		LEFT JOIN g_upline b
		ON a.userid=b.uplid	
		LEFT JOIN g_jpackage c 
		ON a.jpackage=c.id
		WHERE a.upline='".$ckika[1]."'
		AND a.posisi='ka'
		AND a.status='1'
		");

	$user2kika=mysql_fetch_array($text2kika);
	$userid2kika=$user2kika["userid"];
	$nmmember2kika=$user2kika["nmmember"];
	$jml2kika=T_('Ttl').': '.str_replace(",", ".", number_format($user2kika["jki"])).' | '.str_replace(",", ".", number_format($user2kika["jka"]));
	$lvl2kika=T_('Lvl').':&nbsp;&nbsp;'.$user2kika["lki"].' | '.$user2kika["lka"];
	$icon2kika=$user2kika["iconlink"];

if($user2kika["parentstatus"]=='1') $icon2kika=$user2kika["iconlink"];
else $icon2kika=$childlink;
if($user2kika["jpackage"]=='0') $icon2kika=$childlink;
	
	$prm2kika="gjaringan.php?id=".$userid2kika;
}
else {
	if($user1ki["blokir"]=='0'  and $user1ki["jpackage"]>'0') {

	$userid2kika=$daftar;
	$nmmember2kika="";
	$jml2kika="";
	$lvl2kika="";
	$icon2kika="";
	$prm2kika="signup.php?upline=".$userid1ki."&sponsor=".$_SESSION["userid"]."&posisi=ka";
	}
	else {
	$userid2kika="LOCKED";
	$nmmember2kika="";
	$jml2kika="";
	$lvl2kika="";
	$icon2kika="";
	$prm2kika="";		
	}
}


}
else {
	if($user0["blokir"]=='0'  and $user0["jpackage"]>'0' ) {
	$userid1ki=$daftar;
	$nmmember1ki="";
	$jml1ki="";
	$lvl1ki="";
	$icon1ki="";
	$prm1ki="signup.php?upline=".$id."&sponsor=".$_SESSION["userid"]."&posisi=ki";
	}
	else {
	$userid1ki="LOCKED";
	$nmmember1ki="";
	$jml1ki="";
	$lvl1ki="";
	$icon1ki="";
	$prm1ki="";		
	}

	$userid2kiki="";
	$nmmember2kiki="";
	$jml2kiki="";
	$lvl2kiki="";
	$icon2kiki="";
	$prm2kiki="";

	$userid2kika="";
	$nmmember2kika="";
	$jml2kika="";
	$lvl2kika="";
	$icon2kika="";
	$prm2kika="";

}






/*
$c1ka=mysql_query("SELECT 
	   a.userid,
	   a.nmmember
	FROM g_member a 
	WHERE a.upline='".$id."'
	AND a.posisi='ka'
	AND a.status='1'
	");
*/

$cka = explode("|",caripm ($id,'ka'));

	
if($cka[0]!='') {

//if(mysql_num_rows($c1ka)>0) {
	$text1ka=mysql_query("SELECT 
	   a.userid,
	   a.nmmember,
	   a.jpackage,
	   
	   a.blokir,
	   c.iconlink,
	   a.parentstatus,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
	FROM g_member a 
	LEFT JOIN g_upline b
	ON a.userid=b.uplid	
	LEFT JOIN g_jpackage c 
	ON a.jpackage=c.id
	WHERE a.upline='".$cka[1]."'
	AND a.posisi='ka'
	AND a.status='1'
	");

	$user1ka=mysql_fetch_array($text1ka);
	$userid1ka=$user1ka["userid"];
	$nmmember1ka=$user1ka["nmmember"];
	$jml1ka=T_('Ttl').': '.str_replace(",", ".", number_format($user1ka["jki"])).' | '.str_replace(",", ".", number_format($user1ka["jka"]));
	$lvl1ka=T_('Lvl').':&nbsp;&nbsp;'.$user1ka["lki"].' | '.$user1ka["lka"];
//	$icon1ka=$user1ka["iconlink"];

if($user1ka["parentstatus"]=='1') $icon1ka=$user1ka["iconlink"];
else $icon1ka=$childlink;
if($user1ka["jpackage"]=='0') $icon1ka=$childlink;
	
	$prm1ka="gjaringan.php?id=".$userid1ka;

/*
$c2kaki=mysql_query("SELECT 
	   a.userid,
	   a.nmmember
	FROM g_member a 
	WHERE a.upline='".$userid1ka."'
	AND a.posisi='ki'
	AND a.status='1'
	");
*/

$ckaki = explode("|",caripm ($userid1ka,'ki'));

	
if($ckaki[0]!='') {
	

//if(mysql_num_rows($c2kaki)>0) {

	$text2kaki=mysql_query("SELECT 
		   a.userid,
		   a.nmmember,a.jpackage,
		   c.iconlink,
	   a.parentstatus,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
		FROM g_member a 
		LEFT JOIN g_upline b
		ON a.userid=b.uplid	
		LEFT JOIN g_jpackage c 
		ON a.jpackage=c.id
		WHERE a.upline='".$ckaki[1]."'
		AND a.posisi='ki'
		AND a.status='1'		
		");

	$user2kaki=mysql_fetch_array($text2kaki);
	$userid2kaki=$user2kaki["userid"];
	$nmmember2kaki=$user2kaki["nmmember"];
	$jml2kaki=T_('Ttl').': '.str_replace(",", ".", number_format($user2kaki["jki"])).' | '.str_replace(",", ".", number_format($user2kaki["jka"]));
	$lvl2kaki=T_('Lvl').':&nbsp;&nbsp;'.$user2kaki["lki"].' | '.$user2kaki["lka"];
//	$icon2kaki=$user2kaki["iconlink"];
if($user2kaki["parentstatus"]=='1') $icon2kaki=$user2kaki["iconlink"];
else $icon2kaki=$childlink;
if($user2kaki["jpackage"]=='0') $icon2kaki=$childlink;
	
	$prm2kaki="gjaringan.php?id=".$userid2kaki;
}
else {
	if($user1ka["blokir"]=='0' and $user1ka["jpackage"]>'0' ) {
	$userid2kaki=$daftar;
	$nmmember2kaki="";
	$jml2kaki="";
	$lvl2kaki="";
	$icon2kaki="";
	$prm2kaki="signup.php?upline=".$userid1ka."&sponsor=".$_SESSION["userid"]."&posisi=ki";
	}
	else {
	$userid2kaki="LOCKED";
	$nmmember2kaki="";
	$jml2kaki="";
	$lvl2kaki="";
	$icon2kaki="";
	$prm2kaki="";
	}
}

/*
$c2kaka=mysql_query("SELECT 
	   a.userid,
	   a.nmmember
	FROM g_member a 
	WHERE a.upline='".$userid1ka."'
	AND a.posisi='ka'
	AND a.status='1'
	");
*/	

$ckaka = explode("|",caripm ($userid1ka,'ka'));

	
if($ckaka[0]!='') {

//if(mysql_num_rows($c2kaka)>0) {

	$text2kaka=mysql_query("SELECT 
		   a.userid,
		   a.nmmember,a.jpackage,
		   c.iconlink,
	   a.parentstatus,
	   ifnull(sum(if(b.uplposisi='ki' AND b.parentstatus='1', '1','0')),'0') jki, 
	   ifnull(sum(if(b.uplposisi='ka' AND b.parentstatus='1', '1','0')),'0') jka, 
	   ifnull(max(if(b.uplposisi='ki', b.level,NULL))-a.level,'0') lki, 
	   ifnull(max(if(b.uplposisi='ka', b.level,NULL))-a.level,'0') lka 
		FROM g_member a 
		LEFT JOIN g_upline b
		ON a.userid=b.uplid	
		LEFT JOIN g_jpackage c 
		ON a.jpackage=c.id
		WHERE a.upline='".$ckaka[1]."'
		AND a.posisi='ka'
		AND a.status='1'

		");

	$user2kaka=mysql_fetch_array($text2kaka);
	$userid2kaka=$user2kaka["userid"];
	$nmmember2kaka=$user2kaka["nmmember"];
	$jml2kaka=T_('Ttl').': '.str_replace(",", ".", number_format($user2kaka["jki"])).' | '.str_replace(",", ".", number_format($user2kaka["jka"]));
	$lvl2kaka=T_('Lvl').':&nbsp;&nbsp;'.$user2kaka["lki"].' | '.$user2kaka["lka"];
//	$icon2kaka=$user2kaka["iconlink"];
if($user2kaka["parentstatus"]=='1') $icon2kaka=$user2kaka["iconlink"];
else $icon2kaka=$childlink;
if($user2kaka["jpackage"]=='0') $icon2kaka=$childlink;
	
	$prm2kaka="gjaringan.php?id=".$userid2kaka;
}
else {
	if($user1ka["blokir"]=='0' and $user1ka["jpackage"]>'0' ) {
	$userid2kaka=$daftar;
	$nmmember2kaka="";
	$jml2kaka="";
	$lvl2kaka="";
	$icon2kaka="";
	$prm2kaka="signup.php?upline=".$userid1ka."&sponsor=".$_SESSION["userid"]."&posisi=ka";
	}
	else {
	$userid2kaka="LOCKED";
	$nmmember2kaka="";
	$jml2kaka="";
	$lvl2kaka="";
	$icon2kaka="";
	$prm2kaka="";
	}
}


}
else {
	if($user0["blokir"]=='0'  and $user0["jpackage"]>'0' ) {
	$userid1ka=$daftar;
	$nmmember1ka="";
	$jml1ka="";
	$lvl1ka="";
	$icon1ka="";
	$prm1ka="signup.php?upline=".$id."&sponsor=".$_SESSION["userid"]."&posisi=ka";
	}
	else {
	$userid1ka="LOCKED";
	$nmmember1ka="";
	$jml1ka="";
	$lvl1ka="";
	$icon1ka="";
	$prm1ka="";		
	}
	
	$userid2kaki="";
	$nmmember2kaki="";
	$jml2kaki="";
	$lvl2kaki="";
	$icon2kaki="";
	$prm2kaki="";

	$userid2kaka="";
	$nmmember2kaka="";
	$jml2kaka="";
	$lvl2kaka="";
	$icon2kaka="";
	$prm2kaka="";

}


?>	 
    <style type="text/css"> 
        #people {width: 100%;height: 100%; max-width: 800px; max-height: 425px; margin: 0 auto; background: none; border: none !important; margin-bottom: -15px;}
		#people .get-oc-tb {background: none; height: 0; border: none !important;}
		#people div {margin-top: 0;background: none;}
		#people .get-oc-c {background: none; margin-top: -45px; padding-top: -10 !important;}
		g { cursor: pointer; cursor: hand; }
		#people .get-oc-c svg {vertical-align: top; text-align: center;  }
		#people .link {stroke: #000000;}
		#people .get-text-pane {fill: #000000;}
		#people .get-org-chart a{display: none !important;}
		.text-0, .text-1,.text-2, .text-3 {font-family: Arial, Helvetica, sans-serif !important; font-weight: bold;}
	.xuser td {padding: 8px 5px;}
	#the_content {min-width: 800px;}
	td.gjaringanTable {
	text-align:center;
	width: 50%;
	padding: 5px; 
	border: 1px solid #5eae46 !important;
}
    </style>
<div class="row" >
	<div class="col-lg-12">
		<div class="page-header" ><?php echo T_("Genealogy");?></div>
	</div>
</div>

<div id="c_content"  >
<section class="panel" >
	<div class="panel-body  bio-graph-info" >
    
    <?php echo $judul; ?>
    <script type="application/javascript" language="javascript">
	function zjaringan() {
	var prmc=$('#prmc').val();
	$.get('gcek.php?id='+prmc, function(e) {
		var hasil= e.trim();
		if(hasil=='success') {
			loadpagez('gjaringan.php?id='+prmc+'&a1=gjaringan.php');
		}
		else $.messager.alert('<?php echo T_("Data Validity");?>','<?php echo T_("The UserID is not Valid.");?>','error');
		
	});
	
	}
	</script>
<div class="row">
	<div class="col-lg-12">
<div style="text-align: center; margin-bottom: 5px;margin-top: 10px; margin-bottom: 10px; z-index: 999999999 !important;">
<?php echo T_("Searh Member"); ?>: <input type="text" class="default blacktransparent" id="prmc" /> <a href="javascript: void(0);" class="tbutton tsearch " onclick="zjaringan();" style="line-height: 1;">&nbsp;</a><br/>
</div>

    <div id="people" style="margin-top: -15px;"></div>
</div>
    <script type="text/ecmascript">
	$("#people").getOrgChart({		
		theme: "cassandra",
		primaryColumns: ["userid", "nmmember", "jml", "level"],
		imageColumn: "image",
		gridView: true,
		color: "black",
		scale: ".55",
movable: false,
zoomable: false,
editable: false,
searchable: false,
		clickEvent: function( sender, args ) {

			if(args.data["prm"]!='') {
				if ((args.data["prm"]).toLowerCase().indexOf("signup.php") >= 0) {
					$('.selected').removeClass('selected');	
					$('#li-signup').addClass('selected');
				}				
				loadpagez(args.data["prm"]+"&a1=gjaringan.php&a2=<?php echo $id;?>&a3=<?php echo $user0["level"];?>");
			}
            return false; //if you want to cancel the event
        },
		dataSource: [
			{ id: 1, parentId: null, userid: "<?php echo $user0["userid"]; ?>", nmmember: "<?php // echo $user0["nmmember"]; ?>", jml: "<?php echo T_('Ttl').': '.str_replace(",", ".", number_format($user0["jki"])).' | '.str_replace(",", ".", number_format($user0["jka"])); ?>", level: "<?php //echo T_('Lvl').': '.$user0["lki"].' | '.$user0["lka"]; ?>", prm: "<?php echo $prm0; ?>" , image: "<?php echo $icon0; ?>" },

			{ id: 2, parentId: 1, userid: "<?php echo $userid1ki; ?>", nmmember: "<?php // echo $nmmember1ki; ?>", jml: "<?php echo $jml1ki; ?>", level: "<?php //echo $lvl1ki; ?>", prm: "<?php echo $prm1ki; ?>" , image: "<?php echo $icon1ki; ?>" },
			{ id: 3, parentId: 1, userid: "<?php echo $userid1ka; ?>", nmmember: "<?php // echo $nmmember1ka; ?>", jml: "<?php echo $jml1ka; ?>", level: "<?php // echo $lvl1ka; ?>", prm: "<?php echo $prm1ka; ?>" , image: "<?php echo $icon1ka; ?>" },
			{ id: 4, parentId: 2, userid: "<?php echo $userid2kiki; ?>", nmmember: "<?php // echo $nmmember2kiki; ?>", jml: "<?php echo $jml2kiki; ?>", level: "<?php // echo $lvl2kiki; ?>", prm: "<?php echo $prm2kiki; ?>" , image: "<?php echo $icon2kiki; ?>" },
			{ id: 5, parentId: 2, userid: "<?php echo $userid2kika; ?>", nmmember: "<?php // echo $nmmember2kika; ?>", jml: "<?php echo $jml2kika; ?>", level: "<?php // echo $lvl2kika; ?>", prm: "<?php echo $prm2kika; ?>" , image: "<?php echo $icon2kika; ?>" },
			{ id: 6, parentId: 3, userid: "<?php echo $userid2kaki; ?>", nmmember: "<?php // echo $nmmember2kaki; ?>", jml: "<?php echo $jml2kaki; ?>", level: "<?php // echo $lvl2kaki; ?>", prm: "<?php echo $prm2kaki; ?>" , image: "<?php echo $icon2kaki; ?>" },
			{ id: 7, parentId: 3, userid: "<?php echo $userid2kaka; ?>", nmmember: "<?php // echo $nmmember2kaka; ?>", jml: "<?php echo $jml2kaka; ?>", level: "<?php // echo $lvl2kaka; ?>", prm: "<?php echo $prm2kaka; ?>" , image: "<?php echo $icon2kaka; ?>" }
		]

	});

	
    </script>	
</div>    
 
<?php

$uki_0=mysql_query("SELECT distinct parentid FROM g_upline WHERE uplposisi='ki' AND uplid='".$id."' AND level='".($user0["lki"]+$user0["level"])."' AND parentid!='".$user0["userid"]."'");

$sp=mysql_fetch_array(mysql_query("SELECT * FROM g_member WHERE userid='".$user0["upline"]."'"));

// echo "SELECT * FROM g_member WHERE userid='".$user0["upline"]."'";


$uka_0=mysql_query("SELECT distinct parentid FROM g_upline WHERE uplposisi='ka' AND uplid='".$id."' AND level='".($user0["lka"]+$user0["level"])."' AND parentid!='".$user0["userid"]."'");


?>
<?php if(mysql_num_rows($uki_0)>0 or mysql_num_rows($uka_0)>0) { ?> 

<div class="row">
	<div class="col-lg-12">
<div id="infojaringan" class="blacktransparent" style="margin-top: 0;">
<!--   
<table style="width: 80%; margin: 0 auto; font-weight: normal; border-collapse: 
collapse; " >

<tr class="tHeader"style="border-bottom: 1px solid #fff;">
<td class="gjaringanTable"><?php echo T_('Bottom Left');?> (<?php echo T_('Level');?> <?php echo $user0["lki"]; ?>)</td>
<td class="gjaringanTable"><?php echo T_('Bottom Right');?> (<?php echo T_('Level');?> <?php echo $user0["lka"]; ?>)</td>
</tr>

<tr>
<td class="gjaringanTable" >
<?php 
$hitung=1;
while($ruki_0=mysql_fetch_array($uki_0)) { 
?>
<a href="javascript: void(0);" onclick="loadpagez('<?php echo 'gjaringan.php?id='.$ruki_0["parentid"].'&a1=gjaringan.php'; ?>')"><?php echo $ruki_0["parentid"]; ?></a>
<?php  
if($hitung%4) echo ' | '; else echo '<br/>';
$hitung++;
} ?></td>
<td class="gjaringanTable" >
<?php 
$hitung=1;
while($ruka_0=mysql_fetch_array($uka_0)) { 
?>
<a href="javascript: void(0);" onclick="loadpagez('<?php echo 'gjaringan.php?id='.$ruka_0["parentid"].'&a1=gjaringan.php'; ?>')"><?php echo $ruka_0["parentid"]; ?></a><?php 
if($hitung%4) echo ' | '; else echo '<br/>';
$hitung++; 
} ?></td>

</tr>
</table>
-->
</div>
</div>
</div>
<?php } ?>

<div class="row">
	<div class="col-lg-12">
<div id="infojaringan" class="blacktransparent" style="text-align: center;">
<?php if(isset($_GET["a1"])) { 
if($_GET["a1"]=='gjaringan.php') {
if($id!=$_SESSION["userid"]) {
?> 
<!--
    <a href="javascript: void(0);" onclick="loadpagez('<?php echo $_GET["a1"].'?id='.$_GET["a2"]; ?>')" class="blacktransparent" style=" font-weight: bold; padding: 5px; text-decoration: none; margin: 10px auto; clear: both;" >KEMBALI KE <?php echo $_GET["a2"]; ?></a>
    -->

<a href="javascript: void(0);" onclick="loadpagez('<?php echo 'gjaringan.php?id='.$sp["parentid"]; ?>&a1=gjaringan.php')" class="blacktransparent" style=" font-weight: bold; padding: 5px; text-decoration: none; margin: 5px auto; clear: both; font-size: 12px;" ><?php echo T_('To Direct Upline');?></a>
&nbsp;&nbsp;

	<a href="javascript: void(0);" onclick="loadpagez('<?php echo 'gjaringan.php?id='.$_SESSION["userid"]; ?>')" class="blacktransparent" style=" font-weight: bold; padding: 3px; text-decoration: none; margin: 5px auto; clear: both; font-size: 12px;" ><?php echo T_('Back To ');?> <?php echo $_SESSION["userid"]; ?></a>
 
<br/><br/><br/>


<?php } }
else {
	switch($_GET["a1"]) {
		case "djaringan.php"; $a2="DATA JARINGAN"; $divz="djaringan";break;
		case "dashboard.php"; $a2="DASHBOARD"; $divz="dashboard"; break;
	}
	?>
    <!--
<a href="javascript: void(0);" onclick="$('#li-<?php echo $divz;?>').trigger('click');loadpagez('<?php echo $_GET["a1"]; ?>')" class="blacktransparent" style=" font-weight: bold; padding: 3px; text-decoration: none; margin: 5px auto; clear: both; font-size: 12px;" ><?php echo T_('Back To');?> <?php echo $a2; ?></a>
-->
    <?php
}
} 
else {
?>	
&nbsp;
<?php 
}
?>


</div>
</div>

</div>

</div>

</section>
</div>
