<?php include_once('includes/config.php'); ?>
<ul id="menu-detail">
<!--<li onclick="tab3('jarsip',this)">JENIS ARSIP</li>-->
<li onclick="tab3('umum',this)" class="selected"><?php echo strtoupper(T_("General")); ?></li>
<li onclick="tab3('jpackage',this)"><?php echo strtoupper(T_("Packages")); ?></li>
<li onclick="tab3('junilevel',this)"><?php echo strtoupper(T_("Unilevel")); ?></li>
<li onclick="tab3('jmember',this)"><?php echo strtoupper(T_("Manager")); ?></li>
<li onclick="tab3('jkomisi',this)"><?php echo strtoupper(T_("Bonus")); ?></li>
<!--<li onclick="tab3('jreward',this)"><?php echo strtoupper(T_("Rewards")); ?></li>-->
<!--<li onclick="tab3('jproduk',this)"><?php echo strtoupper(T_("Product")); ?></li>-->
<li onclick="tab3('temail',this)"><?php echo strtoupper(T_("Templ. Email")); ?></li>
</ul>
<div id="x_content">
<?php include('umum.php');?>


</div>
