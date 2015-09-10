<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/admin_images/favicon.ico" type="image/x-icon">
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url(); ?>assets/admin/css/style.default.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/jquery.datatables.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-override.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-select.css" />
        <link href="<?php echo base_url() ?>assets/admin/css/popup-box.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/colorpicker.css" />
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/common.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-migrate-1.2.1.min.js"></script>
        <script>
            function site_url(url) {
                return "<?php echo base_url(); ?>" + url;
            }
        </script>
        <link href="<?php echo base_url(); ?>assets/admin/css/admin_main.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>assets/admin_js/html5shiv.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin_js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
        </div>

        <section>
            <div class="leftpanel">
                <?php $this->load->view('includes/logopanel'); ?>
                <?php $this->load->view('includes/navigation'); ?>  
            </div><!-- leftpanel -->
            <div class="mainpanel">
                <?php $this->load->view('includes/header'); ?>
                <div class="pageheader">
                    <h2><i class="fa <?php echo $page_header_icone; ?>"></i><?php echo $page_header; ?></h2>
                </div>
                <div class="contentpanel">
                    <?php $this->load->view($main); ?>
                </div><!-- mainpanel -->               
            </div>
            <?php $this->load->view('includes/footer'); ?>
        </section>

        <!-- Javascript loaded-->

        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/editor/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-ui-1.10.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/toggles.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/retina.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.cookies.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/wysihtml5-0.3.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-wysihtml5.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/store_mod.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-select.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/colorpicker.js"></script>

        <script src="<?php echo base_url(); ?>assets/admin/js/all.js"></script>

        <script type="text/javascript">
           $('document').ready(function () {

            //-----------Datepicker------------------------------
               $('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});

            //----------Color Picker-------------------------------
                if (jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
                        onShow: function (colpkr) {
                            jQuery(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                            jQuery('#colorpicker').val('#' + hex);
                        }
                    });
                }   
            });
        </script>

        <!-- End of JavaScript Loaded-->

    </body>
</html>
