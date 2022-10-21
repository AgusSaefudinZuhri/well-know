<?php include_once('includes/config.php'); ?>
<ul id="menu-detail">
<!--<li onclick="tab3('jarsip',this)">JENIS ARSIP</li>-->
<li onclick="tab3('jfinance',this)" class="selected"><?php echo strtoupper(T_("Finance Type")); ?></li>
<li onclick="tab3('gjfinance',this)"><?php echo strtoupper(T_("Finance Group")); ?></li>
<li onclick="tab3('kurs',this)"><?php echo strtoupper(T_("Currency")); ?></li>
</ul>
<div id="x_content">
<?php include('jfinance.php');?>


</div>
