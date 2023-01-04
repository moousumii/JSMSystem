<?php include('header_account.php');?>
	<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url('supper_admin/'); ?>">Home</a>
                </li>
				<li>
                    <a href="<?php echo base_url('supper_admin/'); ?>">ঠিকানা ব্যবস্থাপনা</a>
                </li>				
                <li class="active">
                    <strong>ঠিকানা সম্পাদনা</strong>
                </li>
            </ol>
		</div>
				
		<div class="col-lg-2">
				
		</div>
	</div>
	
	<div class="row">	
		<div class="col-md-8 col-md-offset-2">	
			<div class="divider-new">
				<h4 class="h4-responsive">ঠিকানা সম্পাদনা </h4>
			</div>
			
			<?php echo form_open('home/update_address'); 
				  //echo form_hidden('user_info_user_id',$this->session->userdata('customer')); 
				  echo form_hidden('adr_id',$address->adr_id); ?>
			<div class="animated fadeInRight">
				<div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    <?php echo form_input(['name'=>'user_name', 'class'=>'form-control', 'value'=>set_value('user_name',$address->user_name)]);
						  echo form_error('user_name'); ?>
                    <label for="form2">Full Name</label>
                </div>
				
				<div class="md-form">
                    <i class="fa fa-phone prefix"></i>
                    <?php echo form_input(['name'=>'contact', 'class'=>'form-control', 'value'=>set_value('conttact',$address->contact)]);
						  echo form_error('contact'); ?>
                    <label for="form2">Contact Number</label>
                </div>			
				
				<div class="md-form">
                    <i class="fa fa-home prefix"></i>
                    <?php echo form_input(['name'=>'address_title', 'class'=>'form-control', 'value'=>set_value('address_title',$address->address_title)]);
						  echo form_error('address_title'); ?>
                    <label for="form2">Address Title</label>
                </div>
				
				<div class="md-form">
					<i class="fa fa-map-marker prefix"></i>
					<?php echo form_textarea(['name'=>'address', 'class'=>'md-textarea', 'rows'=>'2', 'value'=>set_value('address',$address->address)]);
						  echo form_error('address');  ?>
					<label for="form8"> Address</label>
				</div>
			
				
				<div class="col-md-12">
					<?php if($address->default_status==1){ ?>
					<select class="mdb-select" name="default_status">
						<option value="1">Default</option>
					</select>
					<label>Address Type</label>
					<?php } 
					else { ?>
					<select class="mdb-select" name="default_status">
						<option value="0">Other</option>
						<option value="1">Default</option>
					</select>
					<label>Address Type</label>
					<?php } ?>
				</div>
				
				<div class="text-xs-center">
                    <button type="submit" class="btn btn-default ">Save</button>
					<?php echo form_close(); ?>
					<a class="btn btn-danger" href="<?php echo base_url("home/address_management") ; ?>">Back</a>
					<?php if($address->default_status!=1){ ?><a href="<?php echo base_url("home/delete_address/".$address->adr_id) ; ?>" class="btn btn-danger">Delete</a> <?php } ?>
                </div>
			</div>
		</div>
	</div>
	
	
<?php include('footer.php');?>