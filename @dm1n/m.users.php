<?php include_once('includes/config.php');  ?>

<ul id="menu-detail">
<!--<li onclick="tab3('jarsip',this)">JENIS ARSIP</li>-->
<li onclick="tab3('uuser',this)" class="selected"><?php echo strtoupper(T_("Users")); ?></li>
<li onclick="tab3('gusers',this)"><?php echo strtoupper(T_("User Groups")); ?></li>
<li onclick="tab3('huser',this)"><?php echo strtoupper(T_("Access Right")); ?></li>
</ul>
<div id="x_content">
<?php include('uuser.php'); ?>
</div>
