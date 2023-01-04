<!-- Add Address -->
<div class="modal fade modal-ext" id="modal-add-address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
           
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><i class="fa fa-map-marker"></i> Add Address</h3>
            </div>
            
            <!--Body-->
            <div class="modal-body">
				<?php echo form_open('home/add_address'); 
				echo form_hidden('user_info_user_id',$this->session->userdata('customer')); ?>
				<input type="hidden" id="user_id" name="user_info_user_id" value="<?php echo $this->session->userdata('customer') ?>" />
                <div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    <?php echo form_input(['name'=>'user_name', 'class'=>'form-control', 'value'=>set_value('user_name')]);
						  echo form_error('user_name'); ?>
                    <label for="form2">Full Name</label>
					<div style="" id="user_name" class="warningSize red-text"></div>
                </div>
				
				<div class="md-form">
                    <i class="fa fa-phone prefix"></i>
                    <?php echo form_input(['name'=>'contact', 'class'=>'form-control', 'value'=>set_value('conttact')]);
						  echo form_error('contact'); ?>
                    <label for="form2">Contact Number</label>
					<div style="" id="contact" class="warningSize red-text"></div>
                </div>			
				
				<div class="md-form">
                    <i class="fa fa-home prefix"></i>
                    <?php echo form_input(['name'=>'address_title', 'class'=>'form-control', 'value'=>set_value('address_title')]);
						  echo form_error('address_title'); ?>
                    <label for="form2">Address Title</label>
					<div style="" id="address_title" class="warningSize red-text"></div>
                </div>
				
				<div class="md-form">
					<i class="fa fa-map-marker prefix"></i>
					<?php echo form_textarea(['name'=>'address', 'class'=>'md-textarea', 'rows'=>'2', 'value'=>set_value('address')]);
						  echo form_error('address');  ?>
					<label for="form8">Address</label>
					<div style="" id="address" class="warningSize red-text"></div>
				</div>
			
				
				<div class="col-md-12">
					<select class="mdb-select" name="default_status">
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Default</option>
						<option value="0">Other</option>
					</select>
					<label>Address Type</label>
					<div style="" id="default_status" class="warningSize red-text"></div>
				</div>
				
                <div class="text-xs-center">
                    <button type="submit" class="btn btn-default" id="add_address">Add</button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>