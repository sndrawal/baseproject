<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-danger alert-dismissible">
       
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong><?php echo $this->session->flashdata('message'); ?></strong> 
                    
                    
             
    </div>
                  

<?php } else if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong><?php echo $this->session->flashdata('success'); ?></strong> 
    </div>
<?php }?>