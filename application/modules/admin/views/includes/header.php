<div class="headerbar">
    <a class="menutoggle"><i class="fa fa-bars"></i></a>
    <div class="header-right">
        <ul class="headermenu">
            <li>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        My Account
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="<?php echo base_url(); ?>admin/accountSetting"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/changePassword"><i class="glyphicon glyphicon-question-sign"></i> Change Password</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/logOut"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                    </ul>
                </div>
            </li>     
        </ul>
    </div><!-- header-right -->
</div><!-- headerbar -->