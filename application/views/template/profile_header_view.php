<div id="page-header" class="bg-gradient-9">
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">

                <span style="font-family: tahoma;"><b>My Account</b></span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="<?php echo $this->session->user_photo; ?>" alt="">
                        </div>
                        <div class="user-info">
                                        <span>
                                            <?php echo $this->session->user_fullname; ?>
                                            <i> <?php echo $this->session->user_group; ?></i>
                                        </span>
                            <a href="Profile" title="Edit profile">Edit profile</a>
                            <a href="#" title="View notifications">View notifications</a>
                        </div>
                    </div>
                    <div class="divider"></div>

                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="Login/transaction/logout" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->





    <div id="header-nav-right">
        <a href="#" class="hdr-btn popover-button" title="Search" data-placement="bottom" data-id="#popover-search">
            <i class="glyph-icon icon-search"></i>
        </a>
        <div class="hide" id="popover-search">
            <div class="pad5A">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search terms here ...">
                                    <span class="input-group-btn">
                                        <a class="btn btn-primary" href="#">Search</a>
                                    </span>
                </div>
            </div>
        </div>

        <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>
    </div><!-- #header-nav-right -->

</div>