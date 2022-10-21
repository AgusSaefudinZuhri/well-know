<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>AKUNTINGKU MANAGEMENT SYSTEM</title>
<link rel="stylesheet" type="text/css" media="all" href="includes/default.css" />
<link rel="stylesheet" type="text/css" media="all" href="includes/css-ui/jquery-ui-1.10.4.css" />
<script type="text/javascript" src="includes/jquery-1.10.2.js"></script>
<script type="text/javascript" src="includes/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="js/default.js"></script>
<?php
	$begin = date("Y")-100;
	$end = date("Y")-17;
?>
<script type="text/javascript" language="javascript">
  $(function() {
    $( ".datepicker" ).datepicker({
    minDate: new Date(<?php echo $begin; ?>,0,1),
    maxDate: new Date(<?php echo $end; ?>,0,1),
    yearRange: '<?php echo $begin; ?>:<?php echo $end; ?>' ,
    changeYear: true,
    changeMonth: true
});
  });
</script>
<script src="http://malsup.github.com/jquery.form.js"></script>

</head>
<body>
<div id="header-wrapper">
<div id="header-page">
<div id="header-logo">
<a href="<?php echo $website; ?>"><span style="font-size: 24px; font-weight: bold; color: #fff;">AKUNTINGKU</span></a><span style="font-size: 14px;">MANAGEMENT SYSTEM</span></div>
<div style="float: right; margin-right: 10px;">
<?php
if (isset($_SESSION['accountname'], $_SESSION['accountid'])) {
?>
<a href="?p=profile&a=<?php echo $_SESSION['accountname']; ?>"><?php echo $_SESSION['accountname']; ?></a> | <a href="?p=logout">logout</a>
<?php } ?>
</div>
</div>
</div>
<div id="page">
<div id="main">