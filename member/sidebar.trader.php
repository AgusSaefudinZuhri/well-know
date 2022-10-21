<?php 

include_once('includes/config.php');

?>

                         				<li id="li-dashboard" class="mAlone selected" onclick="tab1('dashboard',this,'')">                  
                          <i class="icon-home"></i>
                          <span>&nbsp;<?php echo T_("Dashboard");?></span>
                  </li>
              
                  
				<li class="sub-menu">
                          <div id="li-profile" class="sub-menux" style="border: none;width: 100%;">
                          <i class="fa fa-user"></i>
                          &nbsp;<span><?php echo T_("Profile");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="idx" class="sub">
                          <li id="li-eprofile" onclick="tab1('profile.e',this,'')"><?php echo T_("User Profile");?></li>
                          <li id="li-setup" onclick="tab1('proof.e',this,'')"><?php echo T_("Proof Upload");?></li>
                      </ul>
                  </li> 
                  
                  <li class="sub-menu">
                  <div id="li-withdrawal" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-share"></i>&nbsp;
                          <span><?php echo T_("Finance Operation");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-deposit"		onclick="tab1('deposit' ,this,'')"><?php echo T_("Deposit");?></li>
                          <li id="li-wd"		onclick="tab1('wd' ,this,'')"><?php echo T_("Withdrawal");?></li>
                          <li id="li-trf"		onclick="tab1('transfer' ,this,'')"><?php echo T_("Transfer");?></li>
                          <li id="li-hwd" 	onclick="tab1('trx.h',this,'')"><?php echo T_("History");?></li>
                      </ul>
                  </li>                     
                  


                  <li class="sub-menu">
                  <div id="li-funds" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-th"></i>&nbsp;
                          <span><?php echo T_("Account");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-addacc" 		onclick="tab1('account.add',this,'')"><?php echo T_("Add Account");?></li>
                      </ul>
                  </li>   
                                    
                  <li class="sub-menu">
                  <div id="li-history" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-th-large"></i>&nbsp;
                          <span><?php echo T_("History");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-hkomisi"		onclick="tab1('komisi.h' ,this,'')"><?php echo T_("Commision History");?></li>
                          <li id="li-hdevbonus" 	onclick="tab1('rankbonus.h',this,'')"><?php echo T_("Ranking Bonus History");?></li>
                      </ul>
                  </li>    




                  <li class="sub-menu">
                  <div id="li-support" class="sub-menux" style="border: none;width: 100%;">
                          <i class="fa fa-envelope-o"></i>
                          <span><?php echo T_("Get Support");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
               </div>
                      <ul class="sub">
                           <li id="li-compose" onclick="tab1('compose',this,'')"><?php echo T_("Compose");?></li> 
                           <li id="li-inbox" onclick="tab1('inbox',this,'')"><?php echo T_("Inbox");?></li>
                      </ul>
                  </li>
                  
<script type="text/javascript" src="includes/default.js"></script>