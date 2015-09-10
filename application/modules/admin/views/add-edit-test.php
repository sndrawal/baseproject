<?php $this->load->view('admin/includes/flash_message'); ?>
<?php  
if (!empty($test_detail)) {
    $action = base_url() . 'admin/TestManagement/editTest/' . $test_detail->pk_test_id;
} else {
    $action = base_url() . 'admin/TestManagement/addTest';
}
?>

<div class="panel panel-success">
    <div class="panel-heading">
        <h4 class="panel-title"><?php echo $panel_title ?></h4>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1');
        echo form_open_multipart($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Title Name :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="title" id='title' class="form-control" value='<?php if (!empty($test_detail)) echo $test_detail->title; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Description :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <textarea name="description" style="width:100%"><?php if (!empty($test_detail)) echo $test_detail->description; ?></textarea>
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Input Field :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="input_field" id='input_field' class="form-control" value='<?php if (!empty($test_detail)) echo $test_detail->input_field; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Select :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <select name="select_field" class="form-control">
                    <option value="1" <?php if (!empty($test_detail) && $test_detail->select_field == 1) echo 'selected="selected"'; ?>>option 1</option>
                    <option value="2" <?php if (!empty($test_detail) && $test_detail->select_field == 2) echo 'selected="selected"'; ?>>option 2</option>
                </select>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Radio</label>
          <div class="col-sm-6">
           <div class="radio"><label><input type="radio" name="radio_field" <?php if (!empty($test_detail) && $test_detail->radio_field == 1) echo 'checked="checked"'; ?> value='1'> Radio 1</label></div>
           <div class="radio"><label><input type="radio" name="radio_field" <?php if (!empty($test_detail) && $test_detail->radio_field == 2) echo 'checked="checked"'; ?> value='2'> Radio 2</label></div>
       </div>
   </div>

   <div class="form-group">
    <label class="col-sm-3 control-label">Image :<span class="asterisk">*</span></label>
        <?php
        if (!empty($test_detail)) {
            $img = $test_detail->image_field;
            ?>
            <input type="hidden" name="prev_img" value="<?php echo $img ?>">
            <img src="<?php echo base_url() . 'assets/admin/images/uploads/' . $img ?>" width="100px" height="100px;" style="float: left"><br>
            <?php
        } else {
            $img = 'sample.png';
            ?>
            <img src="<?php echo base_url() . 'assets/admin/images/' . $img ?>" width="75" height="75" style="float: left"><br>
            <?php
        }
        ?>
        <div class="col-sm-7">
            <input type="file" name="userfile" id='name' class="form-control" value='<?php if (!empty($test_detail)) echo $test_detail->image_field; ?>' />
        </div>
    </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Category Color :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="color_picker_field" class="form-control colorpicker-input" id="colorpicker" value='<?php if (!empty($test_detail)) echo $test_detail->color_picker_field; ?>' />
                <span id="colorSelector" class="colorselector">
                    <span style="background-color: rgb(128, 55, 55);"></span>
                </span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Date of Join:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="date_picker_field" class="form-control" id="datepicker" value='<?php if (!empty($test_detail)) echo $test_detail->date_picker_field; ?>' />  
            </div>
        </div>

<div class="panel-footer">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            <button class="btn btn-success"><?php
                if (!empty($test_detail)) {
                    echo 'Update TEST';
                } else {
                    echo 'Add TEST';
                }
                ?></button>&nbsp;
            </div>
        </div>
    </div><!-- panel-footer -->    
    <?php echo form_close(); ?>
</div><!-- panel-body -->
</div><!-- panel -->