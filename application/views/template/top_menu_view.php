

<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('2-1',$this->session->user_rights)?'':'disabled'); ?>" href="Memberships" title=""><span> Activate Card</span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('2-2',$this->session->user_rights)?'':'disabled'); ?>" href="Record_points" title=""><span> Add Reward Points</span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('2-3',$this->session->user_rights)?'':'disabled'); ?>" href="Redeem_points" title=""><span> Redeem Points</span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('2-4',$this->session->user_rights)?'':'disabled'); ?>" href="Member_upgrade" title=""><span> Upgrade Member</span></a>


<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('3-2',$this->session->user_rights)?'':'disabled'); ?>" href="Items" title=""><span>Items</span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('4-1',$this->session->user_rights)?'':'disabled'); ?>" href="Users" title=""><span>Users </span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('4-2',$this->session->user_rights)?'':'disabled'); ?>" href="User_groups" title=""><span>Rights </span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('4-5',$this->session->user_rights)?'':'disabled'); ?>" href="Membership_types" title=""><span>Memberships</span></a>
<a class="btn btn-primary font-white btn-link font-blue <?php echo (in_array('3-1',$this->session->user_rights)?'':'disabled'); ?>" href="Cards" title=""><span>Card</span></a>

<a id="btn_dual_display" class="btn btn-border btn-alt border-orange btn-link font-orange" href="#" title=""><span>Dual Display</span></a>

<a class="btn btn-border btn-alt border-orange btn-link font-orange" href="Login/transaction/logout" title=""><span>Logout</span></a>

