<?php include_once('includes/config.php');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $namaweb; ?> | MEMBER AREA</title>
<link href="../images/favicon.ico" rel="shortcut icon">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="includes/login.css" />



<!--<link rel="stylesheet" type="text/css" media="all" href="includes/default.css" />-->
</head>
<body class="login">

    <div class="form-signin">
      <div class="text-center">
        <img width="100%" src="images/logo-bg.png" >
      </div>
      <hr>
        <div id="login" class="tab-pane active">
          <form action="./" method="post">
            <input type="text" placeholder="UserName" class="form-control"  id="u_username" name="u_username">
            <input type="password" placeholder="Password" class="form-control"   id="u_password" name="u_password" >
			<input type="hidden" name="submit-type" value="user_login">
            <input class="btn btn-lg btn-warning btn-block" type="submit" value="Sign in"  />
          </form>
        </div>
      <hr>
      <div class="text-center">
		  <!--<p class="text-center mt-lg " style="color: #fff;">Not registered? <a class="text-primary" href="../r/">New Member Sign Up Here</a>
		  <br/>
		  <a class="text-primary" href="../f/"><?php echo T_("Forgot Password?");?></a>
		  -->
		  <!--
		  <br/>		  
		  <br/>
		  <a class="btn btn-warning btn-sm" href="../mAgents/"><?php echo T_("Click & View Master Agents");?></a><br/><br/>
		  <a class="btn btn-warning btn-sm" href="../mobAgents/"><?php echo T_("Click & View Mobile Master Agents");?></a>
		  -->

<?php if(isset($_SESSION["errLogin"]) and $_SESSION["errLogin"]==1) { ?>

<div class="alert alert-warning" style="margin-top: 10px;">
							<p class="m-none text-semibold h6"><?php echo T_('Either UserID or Password is Wrongs!!!');?></p>
						</div>
<?php  unset($_SESSION["errLogin"]); } ?>  

      </div>
    </div>


</body>
</html>