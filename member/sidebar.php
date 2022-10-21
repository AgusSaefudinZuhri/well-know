    <div id="left-sidebar"  >
          <div id="sidebar"  >
              <!-- sidebar menu start-->
              <ul id="left-menu" class="sidebar-menu">
				<li id="li-optionz" class="">                  
                    <select class="default" style="width: 100%; padding: 5px; color: #000;" onchange="sidebarOptions(this.value)" >
                    	<option value="1" selected><?php echo T_("Partner");?></option>
                    	
                    	
                    </select>
                  </li>
                  
				<li id="li-dashboard" class="mAlone selected" onclick="tab1('dashboard1',this,'')">                  
                          <i class="icon-home"></i>
                          <span>&nbsp;<?php echo T_("Dashboard");?></span>
                  </li>
                  
                  <!--
				<li id="li-dashboard1" class="mAlone xPartner" style="display: none;" onclick="tab1('dashboard1',this,'')">                  
                          <i class="icon-home"></i>
                          <span>&nbsp;<?php echo T_("Dashboard");?></span>
                  </li>
              -->
                <li id="li-signup" class="mAlone xPartner" onclick="tab1('signup',this,'')">
                          <i class="fa fa-book"></i>
                          <span>&nbsp;<?php echo T_("Register Members");?></span>
                  </li>
                  
				<li class="sub-menu">
                          <div id="li-profile" class="sub-menux" style="border: none;width: 100%;">
                          <i class="fa fa-user"></i>
                          &nbsp;<span><?php echo T_("Profile");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="idx" class="sub">
                          <li id="li-eprofile" onclick="tab1('profile.e',this,'')"><?php echo T_("User Profile");?></li>
                          <li id="li-setup" onclick="tab1('login.history',this,'')"><?php echo T_("Login History");?></li>
                          <li id="li-setup" onclick="tab1('password.login',this,'')"><?php echo T_("Login Password");?></li>
                          <li id="li-setup" onclick="tab1('password.security',this,'')"><?php echo T_("Security Password");?></li>
                      </ul>
                  </li> 
                  
   				<li id="li-gjaringan" class="mAlone xPartner" onclick="tab1('gjaringan',this,'')">                  
                          <i class="glyphicon glyphicon-modal-window"></i>
                          <span>&nbsp;<?php echo T_("Network");?></span>
                  </li>
               
                  <li class="sub-menu ">
                  <div id="li-funds" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-share"></i>&nbsp;
                          <span><?php echo T_("Finance Operation");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-deposit"		onclick="tab1('deposit' ,this,'')"><?php echo T_("Deposit");?></li>
                          <li id="li-wd"		onclick="tab1('wdmt4' ,this,'')"><?php echo T_("Withdrawal");?></li>
                          <!--                          
                          <li id="li-trf"		onclick="tab1('transfer' ,this,'')"><?php echo T_("Transfer");?></li>
                          -->
                          <li id="li-hwd" 	onclick="tab1('trx.h',this,'')"><?php echo T_("History");?></li>
                      </ul>
                  </li>                     
                  

<!--
                  <li class="sub-menu xTrader" >
                  <div id="li-accountx" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-th"></i>&nbsp;
                          <span><?php echo T_("Account");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-addacc" 		onclick="tab1('account.add',this,'')"><?php echo T_("Add Account");?></li>
                          <li id="li-accounts" 		onclick="tab1('accounts',this,'')"><?php echo T_("Accounts");?></li>
                          
                      </ul>
                  </li>   
  -->                                  
                  <li class="sub-menu xPartner" >
                  <div id="li-history" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-th-large"></i>&nbsp;
                          <span><?php echo T_("History");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-hkomisi"		onclick="tab1('komisi.h' ,this,'')"><?php echo T_("Profit Sharing");?></li>
                          <li id="li-hdevbonus" 	onclick="tab1('lotsBonus.h',this,'')"><?php echo T_("Lot Rebate");?></li>
                          <li id="li-hdevbonus" 	onclick="tab1('unilevelBonus.h',this,'')"><?php echo T_("Unilevel Bonus");?></li>
                          <li id="li-hdevbonus" 	onclick="tab1('mgrBonus.h',this,'')"><?php echo T_("Managerial Bonus");?></li>
                      </ul>
                  </li>    

				<?php if($_SESSION["firstlogin"]=='1') { ?>

                                    


                  <li class="sub-menu xPartner" >
                  <div id="li-withdrawal" class="sub-menux" style="border: none;width: 100%;">
                          <i class="glyphicon glyphicon-share"></i>&nbsp;
                          <span><?php echo T_("Bonus Withdrawal");?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          </div>
                      <ul id="ul-ro" class="sub">                      
                          <li id="li-wd"		onclick="tab1('wd' ,this,'')"><?php echo T_("Withdrawal");?></li>
                          <li id="li-hwd" 	onclick="tab1('wd.h',this,'')"><?php echo T_("Withdrawal History");?></li>
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
                  
  				<?php } ?>
              
				<li id="li-signout" onclick="if(confirm('<?php echo T_("Are you sure want to Quit?");?>')){location.href='logout.php'}">                  
                          <i class="fa fa-sign-out"></i>
                          &nbsp;<span><?php echo T_("Sign Out");?></span>
                  </li>
                            </ul>
              <!-- sidebar menu end-->
          </div>
      </div>      <!--sidebar end-->
