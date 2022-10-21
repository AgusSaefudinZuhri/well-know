<?php include_once('includes/config.php');
	$background 	= 'assets/img/extrogate-bg2.jpg';//$dBackground;
 ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $namaweb; ?> - <?php echo strtoupper(T_("Virtual Office")); ?></title>
<link href="../images/favicon.ico" rel="shortcut icon">
<!--<link rel="stylesheet" type="text/css" media="all" href="includes/css-ui/jquery-ui-1.10.4.css" />-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" media="all" href="includes/easyui/themes/default/easyui.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/easyui/themes/icon.css" />
<link rel="stylesheet" type="text/css" media="all" href="getorg/getorgchart/getorgchart.css"  />
<link rel="stylesheet" type="text/css" media="all" href="includes/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="all" href="includes/custom-theme.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/custom-otm2.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/custom-otm.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/datepicker/css/bootstrap-datepicker.css"  />
<link rel="stylesheet" type="text/css" media="all" href="includes/elegant/css/style.css"/>
<link rel="stylesheet" type="text/css" media="all" href="includes/fa/css/font-awesome.min.css"  />   
<link rel="stylesheet" type="text/css" media="all" href="includes/simple-icon/css/simple-line-icons.css"  />   
<link rel="stylesheet" type="text/css" media="all" href="includes/default.css" />


<script type="text/javascript" src="includes/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="includes/jquery.meio.mask.js" charset="utf-8"></script>
<script type="text/javascript" src="includes/datepicker/js/bootstrap-datepicker.js" charset="utf-8"></script>
<!--<script type="text/javascript" src="includes/jquery-ui-1.10.4.js"></script>-->

<script type="text/javascript" src="includes/easyui/jquery.easyui.min.js"></script>

<script type="text/javascript" src="includes/tinymce/tinymce.min.js"></script>

<script type="text/javascript" src="getorg/getorgchart/getorgchart.js"></script>
<script type="text/javascript" src="includes/jquery.nicescroll.js" ></script>

<script type="application/javascript" language="javascript">

function loadingtitle () { return '<?php echo T_("Please Wait"); ?>!!!' }
function loadingmsg () 	 { return '<?php echo T_("Loading Page"); ?>...' }
function onlyNumber () 	 { return '<?php echo T_("Please Input Only Number");?>!!!' }
function dataDisimpan () { return '<?php echo T_("Data is Saved");?>!!!' }
function sucProc () 	 { return '<?php echo T_("Success");?>!!!' }
function errProc () 	 { return '<?php echo T_("Error in Process");?>!!!' }

function sidebarOptions(x) {
	switch(x) {
		case "0" : 
			$(".xTrader").show();
			$(".xPartner").hide();
			$('#li-dashboard').addClass('selected');
			$('#li-dashboard1').removeClass('selected');
			//loadpagez("dashboard.php");
			break;
			
		case "1" :
			$(".xTrader").hide();
			$(".xPartner").show();
			$('#li-dashboard1').addClass('selected');
			$('#li-dashboard').removeClass('selected');			
			//loadpagez("dashboard1.php");
			break;
	}
}
</script>

<script type="text/javascript" src="includes/default.js"></script>
<script type="text/javascript" src="includes/jquery.form.js"></script>
<script type="text/javascript" src="chart/Chart.js"></script>
<style>

html,
body {
	
	/*background: #ecedf0;*/
	width: 100%;
	height: 100%;
	background: url('<?php echo $background; ?>') no-repeat center center #ecedf0  !important;	
	-webkit-background-size: cover !important;
	-moz-background-size: cover !important;
	-o-background-size: cover !important;
	background-size: cover !important;
	background-attachment: fixed !important;	
			
}

</style>
</head>
<body >
<section id="page" style="margin: 0 !important; padding: 0 !important; ">
<div id="main" style="margin: 0 !important; padding: 0 !important; ">

	<header class="header"  style="margin: 0 !important; padding: 0 !important; background: #090909; border: 1px solid #090909; ">

    	<div class="toggle-nav">
        	<div class="icon-reorder" data-placement="bottom">
            	<i class="icon_menu"></i>
            </div>
		</div>

    <div id="header-logo" style="height: 50px; vertical-align: middle;" >
    <a href="./" style="text-decoration: none;">
    <img style="margin: 0 auto; height: 37px; margin: 2px auto;" src="images/logo-bg.png" />
    </a>
    </div>

		<div class="topright-nav">                
                <!-- notificatoin dropdown start-->
			<ul class="nav pull-right top-menu"  style="padding: 0;" >
				<li class="dropdown" style="margin: 0 !important; height: 35px;"> 
                	<a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);" style="height: 100%;"> 
                    	<img src="assets/images/!logged-user.jpg" alt="<?php echo $_SESSION["nmmember"]; ?>" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" style="height: 20px;display: inline-block; float: left;" />&nbsp;&nbsp;
						<div style="float: left; margin: 0 10px;color: #fff;">
                        	<span class="username"><?php echo shortName( $_SESSION["nmmember"] ); ?><br/><?php echo $_SESSION["userid"]; ?></span></div> &nbsp;&nbsp;<b class="caret"></b> </a>
                      <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <?php if($_SESSION['userid']==$_SESSION['parentid']) { ?>
                        <li class="eborder-top"> <a href="javascript: void(0);" onclick="$('#li-profile').click();$('#li-eprofile').click();"><i class="icon_profile"></i> My Profile</a> </li>
                        <li> <a href="javascript: void(0);" onclick="if(confirm('<?php echo T_("Are you sure want to Quit?");?>')){location.href='logout.php'}"><i class="icon_key_alt"></i> Log Out</a> </li>
                        <?php } else { ?>
                        <li> <a href="javascript: void(0);" onclick="if(confirm('<?php echo T_("Are you sure want to go back to Parent Account?");?>')){logAccount('<?php echo $_SESSION["parentid"]; ?>');}"><i class="icon_key_alt"></i> To Parent Account</a> </li>
                        <?php } ?>
                      </ul>
                    </li>
                   
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>  
<div id="mainarea" >
	<?php   include('sidebar.php'); ?>

    <div id="cWrapper" class="wrapper" >
        <div id="the_content">
        <?php include('dashboard1.php');  ?>
        </div>

<div style="height:auto" class="page-footer">

	<div class="page-footer-inner">
		 <p class="copyright"><?php echo date('Y');?> © EXTROGATE TRADING</p>
	</div>
</div>

    </div>


</div>



</div>
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
</section>
<script type="text/javascript" language="javascript">
</script>
<script type="text/javascript" src="includes/footer.js"></script>
</body>
</html>