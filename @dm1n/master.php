<?php include_once('includes/config.php'); 
/*$helper = array_keys($_SESSION);
    foreach ($helper as $key){
        echo $key."=".$_SESSION[$key]."<br/>";
    } */

// print_r($_SESSION);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $namaweb; ?> - ADMIN AREA</title>
<link href="../images/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" type="text/css" media="all" href="includes/css-ui/jquery-ui-1.10.4.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/easyui/themes/default/easyui.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/easyui/themes/icon.css" />
<link rel="stylesheet" type="text/css" media="all" href="getorg/getorgchart/getorgchart.css"  />
<script type="text/javascript" src="includes/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/jquery.meio.mask.js" charset="utf-8"></script>
<script type="text/javascript" src="includes/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="includes/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="includes/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="getorg/getorgchart/getorgchart.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="includes/default.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/custom-theme.css" />

<!--<script type="text/javascript" src="includes/easyui/datagrid/datagrid-detailview.js"></script>-->

<script type="text/javascript" language="javascript">

function loadingtitle () { return '<?php echo T_("Please Wait"); ?>!!!' }
function loadingmsg () 	 { return '<?php echo T_("Loading Page"); ?>...' }
function chPassword () 	 { return '<?php echo T_("Change Password"); ?>' }
function onlyNumber () 	 { return '<?php echo T_("Please Input Only Number");?>!!!' }
function dataDisimpan () { return '<?php echo T_("Data is Saved");?>!!!' }
function sucProc () 	 { return '<?php echo T_("Success");?>!!!' }
function errProc () 	 { return '<?php echo T_("Error in Process");?>!!!' }
function cDeActivate()	 { return "<?php echo T_("DeActivate?"); ?>" }
function cActivate()	 { return "<?php echo T_("Activate?"); ?>" }
function sucDeActivate() { return "<?php echo T_("Data is DeActivated"); ?>" }
function sucActivate()	 { return "<?php echo T_("Data is Activated"); ?>" }
function imgUplMsg()	 { return "<?php echo T_("The image will be resized and cropped to suitable size. Confirm to upload the image?");?>" }
function addEntry()		 { return "<?php echo T_("Confirm to Add Data?");?>" }
function editEntry()	 { return "<?php echo T_("Confirm to Edit Data?");?>" }

</script>

<script src="includes/jquery.form.js"></script>
<script src="includes/default.js"></script>
</head>
<body>
<div id="page">
<div id="main">

<div id="top-profile" style="position: absolute; top: 5px; right: 5px;">
<a href="javascript:void(0)" onclick="l_profile('<?php echo $_SESSION['username_b'];?>')"><?php echo $_SESSION['nama_b'];?></a> | <a id="logout-link" href="javascript: void(0);" onclick="window.location.href = 'logout.php';">logout</a>
</div>

<table id="maintable" style="width: 100%; height: 100%; min-width: 1000px; margin: 0;" cellpadding="0" cellspacing="0" >


<tr>
<td class="tBackground" style="width: 149px !important; height: 100%; text-align: center; padding: 0; background: #090909; ">
<div class="dbHeader" style="height: 32px; padding: 5px 0; margin: 0 !important; margin-top: -1px;">
<a href="./" style="text-decoration: none;"><img style="margin: 0 auto; height: 32px !important;" src="images/logo-bg.png" /></a>
</div>
<?php include('sidebar.php'); ?>
</td>

<td style="background: #fff;padding: 0;">
<div id="the_content">
<?php include('dashboard.php'); ?>
</div>

</td>
</tr>
</table>
</div>
<div id="dialog" style="overflow-x: hidden;"><div id="dialog_content"></div></div>
<div id="dialog1" style="overflow-x: hidden;"><div id="dialog_content1"></div></div>
<div id="dialog2" style="overflow-x: hidden;"><div id="dialog_content2"></div></div>
<div id="dialog3" style="overflow-x: hidden;"><div id="dialog_content3"></div></div>
<div id="dialog4" style="overflow-x: hidden;"><div id="dialog_content4"></div></div>
<div id="dialog5" style="overflow-x: hidden;"><div id="dialog_content5"></div></div>
<div id="dialog6" style="overflow-x: hidden;"><div id="dialog_content6"></div></div>
<div id="dialog7" style="overflow-x: hidden;"><div id="dialog_content7"></div></div>
<div id="dialog8" style="overflow-x: hidden;"><div id="dialog_content8"></div></div>
<div id="dialog9" style="overflow-x: hidden;"><div id="dialog_content9"></div></div>
</div>
</body>
</html>