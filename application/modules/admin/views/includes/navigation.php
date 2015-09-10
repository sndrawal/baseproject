<ul class="nav nav-pills nav-stacked nav-bracket">
    <li <?php
    if ($nav == 'dashboard') {
        echo "class='active'";
    }
    ?>><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a>
    </li> 
    <li <?php
    if ($nav == 'test') {
        echo "class='active'";
    }
    ?>><a href="<?php echo base_url(); ?>admin/TestManagement" ><i class="fa fa-hand-o-right"></i> <span>Test Management</span></a>
    </li>
    
</ul> 

