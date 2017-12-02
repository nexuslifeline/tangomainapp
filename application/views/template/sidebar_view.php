<div id="page-sidebar">
    <div class="scroll-sidebar">


        <ul id="sidebar-menu">
            <li class="header"><span>Overview</span></li>
            <li class="<?php echo (in_array('1',$this->session->parent_rights)?'':'hidden'); ?>" >
                <a href="#" title="Admin Dashboard"  class="<?php echo (in_array('1-1',$this->session->user_rights)?'':'hidden'); ?>" >
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Admin dashboard</span>
                </a>
            </li>


            <li class="header"><span>Menus</span></li>


            <li class="<?php echo (in_array('2',$this->session->parent_rights)?'':'hidden'); ?>" >
                <a href="#" title="Elements">
                    <i class="glyph-icon icon-edit"></i>
                    <span>Transaction</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li class="<?php echo (in_array('2-1',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Memberships" title="Activate Card"><span>Activate Card</span></a></li>
                        <li  class="<?php echo (in_array('2-2',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Record_points" title="Record Points"><span>Record Points</span></a></li>
                        <li  class="<?php echo (in_array('2-3',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Redeem_points" title="Redeem Items"><span>Redeem Items</span></a></li>
                        <li  class="<?php echo (in_array('2-4',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Member_upgrade" title="Upgrade Membership"><span>Upgrade Membership</span></a></li>

                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>

            <li class="<?php echo (in_array('3',$this->session->parent_rights)?'':'hidden'); ?>"  >
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-briefcase"></i>
                    <span>Masterfiles </span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li class="<?php echo (in_array('3-1',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Cards" title="Card Enlistment"><span>Card Enlistment</span></a></li>
                        <li class="<?php echo (in_array('3-2',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Items" title="Item Masterfiles"><span>Item Masterfiles</span></a></li>
                        <li class="<?php echo (in_array('3-3',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Categories" title="Categories"><span>Category Masterfiles</span></a></li>
                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>

            <li class="<?php echo (in_array('4',$this->session->parent_rights)?'':'hidden'); ?>" >
                <a href="#" title="Dashboard boxes">
                    <i class="glyph-icon icon-gear"></i>
                    <span>Settings </span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li class="<?php echo (in_array('4-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Users" title="Register User"><span>Register User</span></a></li>
                        <li class="<?php echo (in_array('4-2',$this->session->user_rights)?'':'hidden'); ?>"  class="<?php echo (in_array('4-2',$this->session->user_rights)?'':'hidden'); ?>" ><a href="User_groups" title="Create User Rights"><span>Create User Rights</span></a></li>
                        <li class="<?php echo (in_array('4-3',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Branches" title="Create Branch"><span>Create Branch</span></a></li>
                        <li class="<?php echo (in_array('4-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Profile" title="Profile"><span>User Profile</span></a></li>
                        <li class="<?php echo (in_array('4-5',$this->session->user_rights)?'':'hidden'); ?>" ><a href="Membership_types" title="Setup Membership Types"><span>Setup Membership Types</span></a></li>
                        <li class="<?php echo (in_array('4-6',$this->session->user_rights)?'':'hidden'); ?>" ><a href="System_setup" title="Advertisement Setup"><span>Advertisement Setup</span></a></li>
                        <li class="<?php echo (in_array('4-7',$this->session->user_rights)?'':'hidden'); ?>" ><a href="#" id="link_setup_reward" title="Setup Reward"><span>Reward Preference</span></a></li>

                    </ul>

                </div><!-- .sidebar-submenu -->
            </li>

        </ul><!-- #sidebar-menu -->


    </div>
</div>
