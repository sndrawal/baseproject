<?php $this->load->view('includes/flash_message'); ?>
<?php $user_info = $userInfo; ?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h4 class="panel-title"><?php echo $panel_title ?></h4>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $action = base_url() . "admin/accountSetting/accountDetail/" . $user_type;
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open($action, $attributes);
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-7">
                <input type="text" name="name" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['name']; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Email Address:</label>
            <div class="col-sm-7">
                <input type="email" name="email_address" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['email_address']; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Contact Number:</label>
            <div class="col-sm-7">
                <input type="text" name="contact_no" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['contact_no']; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Address 1:</label>
            <div class="col-sm-7">
                <input type="text" name="address1" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['address1']; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Address 2:</label>
            <div class="col-sm-7">
                <input type="text" name="address2" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['address2']; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Location:</label>
            <div class="col-sm-7">
                <select class="form-control chosen-select" name='country' data-placeholder="Choose a Country...">
                    <?php foreach ($country_name as $list): ?>
                        <option value='<?php echo $list['id'] ?>' <?php if (isset($user_info) && $user_info['county_id'] == $list['id']) echo "selected='selected'"; ?>> <?php echo $list['nicename']; ?></option>
                    <?php endforeach; ?>    
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">City:</label>
            <div class="col-sm-7">
                <input type="text" name="city" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['city']; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">PostCode:</label>
            <div class="col-sm-7">
                <input type="text" name="postcode" class="form-control" value='<?php if (!empty($user_info)) echo $user_info['post_code']; ?>' />
            </div>
        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    <button class="btn btn-success">Save</button>&nbsp;
                </div>
            </div>
        </div><!-- panel-footer -->    
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->