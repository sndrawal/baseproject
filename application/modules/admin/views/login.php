<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin/images/favicon.png" type="image/png">
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url(); ?>assets/admin/css/style.default.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/admin_main.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>assets/admin_js/html5shiv.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin_js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="signin" background-color="black" onload="javascript:$('.uname').focus()" >
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
        </div>
        <section>
            <div class="signinpanel">
                <div class="row">
                    <div class="col-md-12">

                        <?php
                        $action = base_url() . 'login';
                        echo form_open($action);
                        ?> 
                        <fieldset>
                            <h4 class="nomargin">Sign In</h4>
                            <p class="mt5 mb20">Login to access your account.</p>
                            <?php $this->load->view('includes/flash_message'); ?>
                            <input type="text" class="form-control uname" name="email" placeholder="Email address" />
                            <input type="password" class="form-control pword" name="password" placeholder="Password" />
                            <button class="btn btn-success btn-block">Sign In</button>
                        </fieldset>
                        <?php echo form_close(); ?>
                    </div><!-- col-sm-5 -->
                </div><!-- row -->
                <div class="signup-footer">
                    <div class="pull-left">
                        &copy; <?php echo date("Y"); ?>. All Rights Reserved.{{PROJECT_NAME}}.
                    </div>
                </div>
            </div><!-- signin -->
        </section>

        <!-- Javascript loaded-->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/retina.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <!-- End of JavaScript Loaded-->

    </body>
</html>
