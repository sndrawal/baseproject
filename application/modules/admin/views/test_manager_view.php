<div class="row">
    <div class="col-md-12">
        <?php
        $this->load->view('includes/flash_message');
        ?>
        <div class="panel-footer">
            <a class="btn btn-success" href="<?php echo base_url(); ?>admin/TestManagement/add">Add New TEST DATA</a>
        </div>
       
        <div class="table-responsive">
            <table class="table table-striped mb30" id="table1" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">SN.</th>
                        <th width="20%">Title </th>
                        <th width="20%">Description</th>
                        <th width="20%">Input Field</th>
                        <th width="10%" class="table-action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($this->uri->segment(3) == NULL) {
                        $i = 1;
                    } else {
                        $i = $this->uri->segment(3) + 1;
                    }
                    if (!empty($test_info)) { 
                        foreach ($test_info as $key):
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $key->title ; ?></td>
                                <td><?php echo $key->description; ?></td>
                                <td><?php echo $key->input_field; ?></td>
                                <td class="table-action">
                                    <a href="<?php echo base_url(); ?>admin/TestManagement/edit/<?php echo $key->pk_test_id; ?>"><i class="fa fa-edit tooltips" data-original-title="Edit TEST"></i></a> 
                                     <a id="delete_<?php echo $key->pk_test_id; ?>" href="javascript:void(0);" onclick="showPopupBox('delete_<?php echo $key->pk_test_id; ?>', 'Are you sure to delete a TEST ?', '<?php echo base_url(); ?>admin/TestManagement/deleteTest/<?php echo $key->pk_test_id; ?>');" class="delete-row"><i class="fa fa-trash-o tooltips" data-original-title="Delete TEST"></i></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        endforeach;
                    } else {
                        ?>
                        <tr>
                            <td colspan="8"><center>No TEST DATA Found !!!</center></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div><!-- table-responsive -->

    </div><!-- col-md-6 -->
</div>

<!-- div for the pop up messages mainly during click on a delete button -->
<div id="popup" class="popup_msg">
    <p id="popup_message"></p>
    <div class="ok_btn_align">
        <div class="ok_btn"><a id="yes" hreflang="" href="javascript:hidePopupBox('yes')">Yes</a></div>
        <div class="ok_btn"><a href="javascript:hidePopupBox('no')">No</a></div>
    </div>
</div>