<div class="row">
    <div class="col-md-6">
        <?php
        $action = base_url() ."admin/changePasswordDetail";
        $attributes = array('class' => 'form-horizontal', 'id' => 'form1');
        echo form_open($action, $attributes);
        ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">Admin Password Change</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-4 control-label">Current Password:<span class="asterisk">*</span></label>
                    <div class="col-sm-8">
                        <input type="password" name="old_password" class="form-control" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">New Password:<span class="asterisk">*</span></label>
                    <div class="col-sm-8">
                        <input type="password" name="new_password" class="form-control" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">ReEnter Password:<span class="asterisk">*</span></label>
                    <div class="col-sm-8">
                        <input type="password" name="retype_password" class="form-control" required/>
                    </div>
                </div>
            </div><!-- panel-body -->
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        <button class="btn btn-success">Save Password</button>
                    </div>
                </div>
            </div><!-- panel-footer -->
        </div><!-- panel-default -->
        <?php echo form_close(); ?>
    </div><!-- col-md-6 -->
</div><!-- row -->